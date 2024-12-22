<?php

namespace App\Http\Controllers;
use App\Models\Techer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CoursItem;
use App\Models\Cours;
use App\Models\Contact;
use App\Models\ContactMessaga;

class OnlineController extends Controller
{
    public function index(){
        $Contact = Contact::first();
        return view('user.index',compact('Contact'));
    }
    public function techer(){
        $Techer = Techer::get();
        return view('user.techer',compact('Techer'));
    }
    public function cours(){
        $Cours = Cours::get();
        return view('user.cours',compact('Cours'));
    }
    public function contact(){
        $Contact = Contact::first();
        return view('user.contact',compact('Contact'));
    }
    public function message_add(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'discriotion' => 'required|string',
        ]);
        ContactMessaga::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'discriotion' => $validated['discriotion'],
        ]);
        return redirect()->back()->with('success', 'Xabaringiz muvaffaqiyatli yuborildi!');
    }
    public function user_cours_show($id){
        $Cours = Cours::find($id);
        $CoursItem = CoursItem::where('cours_id',$id)->get();
        $Count = count($CoursItem);
        return view('user.cours_item',compact('Cours','CoursItem','Count'));
    }
}
