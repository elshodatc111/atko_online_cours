@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}">Home </a> /
    <a href="{{ route('admin_cours') }}">Kurslar </a> / 
    <a href="{{ route('admin_cours_show', $Cours['id'] ) }}">Kurs </a> / Kurs haqida
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">{{ $Cours['cours_name'] }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <div class="ratio ratio-16x9">
                                <video controls controlsList="nodownload" disablePictureInPicture muted loop>
                                    <source src="{{ $CoursItem['video_url'] }}" type="video/mp4">
                                </video>
                            </div>
                                <hr>
                            <audio controls>
                                <source src="{{ $CoursItem['audio_url'] }}" type="audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-9">
                            <form action="{{ route('admin_cours_item_show_update') }}" method="post">
                                @csrf 
                                @method('put')
                                <input type="hidden" name="mavzu_id" value="{{ $CoursItem['id'] }}">
                                <label for="item_name" class="my-2">Mavzu nomi</label>
                                <input type="text" required name="item_name" value="{{ $CoursItem['item_name'] }}" class="form-control">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="video_url" class="my-2">Mavzu video manzili</label>
                                        <input type="text" required name="video_url" value="{{ $CoursItem['video_url'] }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="audio_url" class="my-2">Mavzju audio manzili(Mavjud bo'lmasa NULL qo'yilsin)</label>
                                        <input type="text" required name="audio_url" value="{{ $CoursItem['audio_url'] }}" class="form-control">
                                    </div>
                                </div>
                                <label for="item_discription" class="my-2">Mavzu haqida</label>
                                <textarea name="item_discription" required class="form-control">{{ $CoursItem['item_discription'] }}</textarea>
                                <button class="btn btn-primary w-100 mt-4" type="submit">O'zgarishlarni saqlash</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
