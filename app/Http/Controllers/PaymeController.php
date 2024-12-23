<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCours;
use App\Models\Cours;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
class PaymeController extends Controller{
    public function index(Request $request){
        if($request->method == 'CheckPerformTransaction'){
            if(empty($request->params['amount'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -31001,
                        'message' => 'Неверная сумма.'
                    ]
                ];
                return json_encode($response);
            }
            elseif(empty($request->params['account'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Ошибки связанные с неверным пользовательским вводом “account“.'
                    ]
                ];
                return json_encode($response);
            }elseif(empty($request->params['account']['order_id'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Ошибки связанные с неверным пользовательским вводом "order_id".'
                    ]
                ];
                return json_encode($response);
            }
            else{
                $account = $request['params']['account'];
                $Order = Order::where('id',$account['order_id'])->first();
                if(empty($Order)){
                    $response = [
                        'id' => $request->id,
                        'error' => [
                            'code' => -31099,
                            'message' => [
                                'uz' => 'Buyurtma topilmadi',
                                'ru' => 'Заказ не найден',
                                'en' => 'Order not fount'
                            ]
                        ]
                    ];
                    return json_encode($response);
                }else if($Order->price != $request->params['amount']){
                    $response = [
                        'id' => $request->id,
                        'error' => [
                            'code' => -31099,
                            'message' => [
                                'uz' => 'Noto`g`ri summa',
                                'ru' => 'Noto`g`ri summa',
                                'en' => 'Noto`g`ri summa'
                            ]
                        ]
                    ];
                    return json_encode($response);
                }
                $response = [
                    "result" => [
                        "allow" => true
                    ]
                ];
                return json_encode($response);
            }
        }elseif($request->method == 'CreateTransaction'){
            if(empty($request->params['amount'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -31001,
                        'message' => 'Неверная сумма.'
                    ]
                ];
                return json_encode($response);
            }
            elseif(empty($request->params['account'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Ошибки связанные с неверным пользовательским вводом “account“.'
                    ]
                ];
                return json_encode($response);
            }
            elseif(empty($request->params['account']['order_id'])){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -31099,
                        'message' => 'Ошибки связанные с неверным пользовательским вводом “order_id“.'
                    ]
                ];
                return json_encode($response);
            }
            else{
                $account = $request['params']['account'];
                $order_id = $account['order_id'];
                $order = Order::where('id',$order_id)->first();
                $transaction = Transaction::where('order_id',$order_id)->where('state', 1)->get();
                if($order->price != $request->params['amount']){
                    $response = [
                        'id' => $request->id,
                        'error' => [
                            'code' => -31099,
                            'message' => [
                                'uz' => 'Noto`g`ri summa',
                                'ru' => 'Noto`g`ri summa',
                                'en' => 'Noto`g`ri summa'
                            ]
                        ]
                    ];
                    return json_encode($response);
                }
                elseif(count($transaction)==0){
                    $Transaction = Transaction::create([
                        'paycom_transaction_id'=>$request->params['id'],
                        'paycom_time'=>$request->params['time'],
                        'paycom_time_datetime'=>now(),
                        'amount'=>$request->params['amount'],
                        'state' => 1,
                        'order_id' => $order_id,
                    ]);
                    $response = [
                        "result" => [
                            "create_time" => $request->params['time'],
                            "transaction" => strval($Transaction->id),
                            "state" => $Transaction->state,
                        ]
                    ];
                    return json_encode($response);
                }
                elseif(count($transaction)==1 AND ($transaction->first()->paycom_time == $request->params['time']) AND ($transaction->first()->paycom_transaction_id == $request->params['id'])){
                    $response = [
                        "result" => [
                            "create_time" => $request->params['time'],
                            "transaction" => "{$transaction[0]->id}",
                            "state" => intval($transaction[0]->state),
                        ]
                    ];
                    return json_encode($response);
                }
                else{
                    $response = [
                        'id' => $request->id,
                        'error' => [
                            'code' => -31099,
                            'message' => [
                                'uz' => 'Buyurtma to\'lovi hozirda amalga oshirilmoqda',
                                'ru' => 'Noto`g`ri summa',
                                'en' => 'Noto`g`ri summa'
                            ]
                        ]
                    ];
                    return json_encode($response);
                }
            }
        }elseif($request->method == 'CheckTransaction'){
            $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
            if(empty($transaction)){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Транзакция не найдена.'
                    ]
                ];
                return json_encode($response);
            }
            elseif($transaction->state == 1){
                $response = [
                    'result' => [
                        "create_time" => intval($transaction->paycom_time),
                        "perform_time" => intval($transaction->perform_time_unix),
                        "cancel_time" => 0,
                        "transaction" => strval($transaction->id),
                        "state" => $transaction->state,
                        "reason" => $transaction->reason
                    ]
                ];
                return json_encode($response);
            }elseif($transaction->state == 2){
                $response = [
                    'result' => [
                        "create_time" => intval($transaction->paycom_time),
                        "perform_time" => intval($transaction->perform_time_unix),
                        "cancel_time" => 0,
                        "transaction" => strval($transaction->id),
                        "state" => $transaction->state,
                        "reason" => $transaction->reason
                    ]
                ];
                return json_encode($response);
            }elseif($transaction->state == -2){
                $response = [
                    'result' => [
                        "create_time" => intval($transaction->paycom_time),
                        "perform_time" => intval($transaction->perform_time_unix),
                        "cancel_time" => intval($transaction->cancel_time),
                        "transaction" => strval($transaction->id),
                        "state" => $transaction->state,
                        "reason" => $transaction->reason
                    ]
                ];
                return json_encode($response);
            }elseif($transaction->state == -1){
                $response = [
                    'result' => [
                        "create_time" => intval($transaction->paycom_time),
                        "perform_time" => intval($transaction->perform_time_unix),
                        "cancel_time" => intval($transaction->cancel_time),
                        "transaction" => strval($transaction->id),
                        "state" => $transaction->state,
                        "reason" => $transaction->reason
                    ]
                ];
                return json_encode($response);
            }
        }elseif($request->method == 'PerformTransaction'){
            $ldate = date('Y-m-d H:i:s');
            $transaction = Transaction::where('paycom_transaction_id', $request->params['id'])->first();
            if(empty($transaction)){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Транзакция не найдена.'
                    ]
                ];
                return json_encode($response);
            }elseif($transaction->state == 1){
                $currentMillis = intval(microtime(true)*1000);
                $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
                $transaction->state = 2;
                $transaction->perform_time = $ldate;
                $transaction->perform_time_unix = str_replace('.','',$currentMillis);
                $transaction->update();
                $Order = Order::find($transaction->order_id);
                $Order->status = "To'lov qilindi";
                $Order->payment_method = "Payme";
                $Order->save();
                $UserCours = UserCours::where('cours_id',$Order->cours_id)->where('user_id',$Order->user_id)->first();
                $Cours = Cours::find($Order->cours_id);
                $lessin_davomiyligi = $Cours->lessin_davomiyligi;
                $today = Carbon::today();
                $dateAfterFiveDays = $today->addDays(intval($lessin_davomiyligi));
                $end = $dateAfterFiveDays->format('Y-m-d');
                if(empty($UserCours)){
                    UserCours::create([
                        'cours_id'=>$Order->cours_id, 
                        'user_id'=>$Order->user_id, 
                        'start'=>date("Y-m-d"), 
                        'end'=>$end, 
                        'status'=>'true',
                    ]);
                }else{
                    $UserCours->end = $end;
                    $UserCours->status = 'true';
                    $UserCours->update();
                }
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "perform_time" => intval($transaction->perform_time_unix),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }elseif($transaction->state == 2){
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "perform_time" => intval($transaction->perform_time_unix),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }
        }elseif($request->method == 'CancelTransaction'){
            $ldate = date('Y-m-d H:i:s');
            $transaction = Transaction::where('paycom_transaction_id', $request->params['id'])->first();
            if(empty($transaction)){
                $response = [
                    'id' => $request->id,
                    'error' => [
                        'code' => -32504,
                        'message' => 'Транзакция не найдена.'
                    ]
                ];
                return json_encode($response);
            }
            elseif($transaction->state ==1){
                $currentMillis = intval(microtime(true)*1000);
                $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
                $transaction->reason = $request->params['reason'];
                $transaction->cancel_time = str_replace('.','',$currentMillis);
                $transaction->state = -1;
                $transaction->update();
                $Order = Order::find($transaction->order_id);
                $Order->status = "Bekor qilindi";
                $Order->save();
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "cancel_time" => intval($transaction->cancel_time),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }
            elseif($transaction->state ==2){
                $currentMillis = intval(microtime(true)*1000);
                $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
                $transaction->reason = $request->params['reason'];
                $transaction->cancel_time = str_replace('.','',$currentMillis);
                $transaction->state = -2;
                $transaction->update();
                $Order = Order::find($transaction->order_id);
                $Order->status = "Bekor qilindi";
                $Order->save();
                $UserCours = UserCours::where('cours_id',$Order->cours_id)->where('user_id',$Order->user_id)->first();
                $today = Carbon::today();
                $dateAfterFiveDays = $today->addDays(intval(-1));
                $end = $dateAfterFiveDays->format('Y-m-d');
                $UserCours->end = $end;
                $UserCours->update();
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "cancel_time" => intval($transaction->cancel_time),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }
            elseif($transaction->state ==-1){
                $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "cancel_time" => intval($transaction->cancel_time),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }else{
                $transaction = Transaction::where('paycom_transaction_id',$request->params['id'])->first();
                $response = [
                    'result' => [
                        "transaction" => "{$transaction->id}",
                        "cancel_time" => intval($transaction->cancel_time),
                        "state" => intval($transaction->state)
                    ]
                ];
                return json_encode($response);
            }
        }elseif($request->method == 'GetStatement'){
            return response()->json([
                'result'=>[
                    'transactions' => [],
                ]
            ]);
        }
    }
}
