<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Techer;
use App\Models\Cours;
use App\Models\Contact;
use App\Models\ContactMessaga;
use Illuminate\Support\Str;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->type!='admin'){
            return route('user_home');
        }
        return view('admin.home');
    }
    public function techer(){
        $Techer = Techer::get();
        return view('admin.techer',compact('Techer'));
    }
    public function techer_story(Request $request){
        $validated = $request->validate([
            'techer_name' => 'required|string|max:255',
            'techer_title' => 'required|string|max:255',
            'techer_image' => 'required|image|mimes:jpg,png|max:2048', // Maksimal o'lcham: 2MB
            'telegram' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'techer_discription' => 'required|string',
        ]);
        if ($request->hasFile('techer_image')) {
            $imageName = Str::random(20) . '.' . $request->file('techer_image')->getClientOriginalExtension();
            $imagePath = $imageName;
            $request->file('techer_image')->move(public_path('image/techer'), $imageName);
        }
        $teacher = new \App\Models\Techer();
        $teacher->techer_name = $validated['techer_name'];
        $teacher->techer_title = $validated['techer_title'];
        $teacher->techer_image = $imagePath ?? null;
        $teacher->telegram = $validated['telegram'];
        $teacher->instagram  = $validated['instagram'];
        $teacher->facebook = $validated['facebook'];
        $teacher->techer_discription = $validated['techer_discription'];
        $teacher->save();
        return redirect()->back()->with('status', 'O‘qituvchi muvaffaqiyatli saqlandi!');
    }
    public function techer_update($id){
        $Techer = Techer::find($id);
        $Techer->delete();
        return redirect()->back()->with('status', 'O‘qituvchi muvaffaqiyatli o‘chirildi!');
    }
    public function cours(){
        $Techer = Techer::get();
        $Cours = Cours::get();
        return view('admin.cours',compact('Techer','Cours'));
    }
    public function cours_story(Request $request){
        $validated = $request->validate([
            'cours_name' => 'required|string|max:255',
            'cours_image' => 'required|image|mimes:jpg,png|max:2048', // Maksimal rasm o‘lchami 2MB
            'lessin_time' => 'required|string|max:255',
            'techer_name' => 'required|string|max:255',
            'lessin_daraja' => 'required|string|max:255',
            'lessin_price' => 'required|numeric',
            'lessin_davomiyligi' => 'required|string|max:255',
            'cours_description' => 'required|string',
        ]);
        if ($request->hasFile('cours_image')) {
            $imageName = Str::random(20) . '.' . $request->file('cours_image')->getClientOriginalExtension();
            $imagePath = $imageName;
            $request->file('cours_image')->move(public_path('image/banner'), $imageName);
        }
        $course = new Cours();
        $course->cours_name = $validated['cours_name'];
        $course->cours_image = $imagePath ?? null; // Rasm yo‘li
        $course->lessin_time = $validated['lessin_time'];
        $course->techer_name = $validated['techer_name'];
        $course->lessin_daraja = $validated['lessin_daraja'];
        $course->lessin_price = $validated['lessin_price'];
        $course->lessin_davomiyligi = $validated['lessin_davomiyligi'];
        $course->cours_description = $validated['cours_description'];
        $course->save();
        return redirect()->back()->with('status', 'Kurs muvaffaqiyatli saqlandi!');
    }
    public function contact(){
        $Contact = Contact::first();
        if($Contact){
            $status = 'false';
        }else{
            $status = 'true';
        }
        $ContactMessaga = ContactMessaga::get();
        return view('admin.contact',compact('status','Contact','ContactMessaga'));
    }
    public function contact_create(Request $request){
        $validatedData = $request->validate([
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'addres' => 'required|string|max:255',
            'video' => 'required|url|max:255',
        ]);
        Contact::create([
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'addres' => $validatedData['addres'],
            'video' => $validatedData['video'],
        ]);
        return redirect()->back()->with('status', 'Contact muvaffaqiyatli saqlandi!');
    }
    public function contact_update(Request $request, $id){
        $validatedData = $request->validate([
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'addres' => 'required|string|max:255',
            'video' => 'required|url|max:255',
        ]);
        $Contact = Contact::first();
        $Contact->phone = $request->phone;
        $Contact->email = $request->email;
        $Contact->addres = $request->addres;
        $Contact->video = $request->video;
        $Contact->save();
        return redirect()->back()->with('status', 'Contact muvaffaqiyatli yangilandi!');
    }


}
