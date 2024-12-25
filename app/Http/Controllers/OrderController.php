<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function paymart($id){ 
        $Order = Order::where('cours_id',$id)->where('user_id',auth()->user()->id)->where('price',Cours::find($id)->lessin_price)->where('status','Kutilmoqda')->first();
        if(empty($Order)){
            $Order = Order::create([
                'cours_id' => $id,
                'user_id' => auth()->user()->id,
                'price' => Cours::find($id)->lessin_price,
                'status' => "Kutilmoqda",
                'payment_method' => 'witing',
            ]);
        }
        $Cours = Cours::find($id);
        return view('user.cours_paymart',compact('Order','Cours'));
    }

}
