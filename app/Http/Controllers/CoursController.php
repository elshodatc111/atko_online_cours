<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use App\Models\UserCours;
use App\Models\CoursItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CoursController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function lessin_show($id){
        $UserCours = UserCours::where('cours_id',$id)->where('user_id',auth()->user()->id)->first();
        if($UserCours){
            return redirect()->route('my_cours_show',$id);
        }else{
            UserCours::create([
                'cours_id' => $id,
                'user_id' => auth()->user()->id,
                'start' => date('Y-m-d'),
                'end' => '2026-12-31',
                'status' => 'true',
            ]);
            return redirect()->route('my_cours_show',$id);
        }
    }
    public function my_cours(){
        $UserCours = UserCours::where('user_cours.user_id',auth()->user()->id)->where('user_cours.end','>=',date('Y-m-d'))->join('cours','cours.id','=','user_cours.cours_id')->get();
        //dd($UserCours);
        return view('user.my_cours',compact('UserCours'));
    }
    public function my_cours_show($id){
        $Cours = Cours::find($id);
        $CoursItem = CoursItem::where('cours_id',$id)->get();
        return view('user.my_cours_show',compact('Cours','CoursItem'));
    }
    public function my_cours_show_item($cours_id,$item_id){
        $Cours = Cours::find($cours_id);
        $CoursItem = CoursItem::where('cours_id',$cours_id)->get();
        $Item = CoursItem::find($item_id);
        return view('user.my_cours_show_item',compact('Cours','CoursItem','Item'));
    }
}
