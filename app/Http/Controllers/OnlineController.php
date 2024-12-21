<?php

namespace App\Http\Controllers;
use App\Models\Techer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Cours;

class OnlineController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function techer(){
        $Techer = Techer::get();
        return view('user.techer',compact('Techer'));
    }
    public function cours(){
        $Cours = Cours::get();
        return view('user.cours',compact('Cours'));
    }

}
