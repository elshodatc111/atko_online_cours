@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">Kurs haqida</h4>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Yangi Mavzu</button>
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
                            <img src="../../image/banner/{{ $Cours['cours_image'] }}" style="width:100%">
                            <form action="{{ route('admin_image_update',$Cours['id']) }}" method="post"  enctype="multipart/form-data">
                                @csrf 
                                @method('put')
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <input type="file" name="cours_image" required class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100">Update image</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-9">
                            <form action="{{ route('admin_all_update',$Cours['id'] ) }}" method="post">
                                @csrf 
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <label for="cours_name">Kurs nomi</label>
                                        <input type="text" required name="cours_name" value="{{ $Cours['cours_name'] }}" class="form-control">
                                        <label for="lessin_time">Video dars uzunligi</label>
                                        <input type="time" required name="lessin_time" value="{{ $Cours['lessin_time'] }}" class="form-control">
                                        <label for="techer_name">O'qituvchi</label>
                                        <input type="text" required name="techer_name" value="{{ $Cours['techer_name'] }}" class="form-control">
                                        <label for="cours_description">Kurs haqida</label>
                                        <input type="text" required name="cours_description" value="{{ $Cours['cours_description'] }}" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="lessin_daraja">Dars darajasi</label>
                                        <input type="text" required name="lessin_daraja" value="{{ $Cours['lessin_daraja'] }}" class="form-control">
                                        <label for="lessin_price">Dars narxi</label>
                                        <input type="number" required name="lessin_price" value="{{ $Cours['lessin_price'] }}" class="form-control">
                                        <label for="lessin_davomiyligi">Dars davomiyligi</label>
                                        <input type="number" required name="lessin_davomiyligi" value="{{ $Cours['lessin_davomiyligi'] }}" class="form-control">
                                        <button class="btn btn-primary w-100 mt-4" type="submit">O'zgarishlarni saqlash</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="mt-1">Kurs mavzulari</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mavzu nomi</th>
                                <th>video url</th>
                                <th>audio url</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($CoursItem as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['item_name'] }}</td>
                                <td>{{ $item['video_url'] }}</td>
                                <td>{{ $item['audio_url'] }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=5 class="text-center">Kurs mavzulari mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin_cours_item_story') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yangi Mavzu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cours_id" value="{{ $Cours['id'] }}">
                    <label for="item_name">Mavzu nomi</label>
                    <input type="text" name="item_name" required class="form-control">
                    <label for="video_url" class="mt-2">Mavzu video url</label>
                    <input type="text" name="video_url" required class="form-control">
                    <label for="audio_url" class="mt-2">Mavzu audio url (Mavjud bo'lmasa NULL )</label>
                    <input type="text" name="audio_url" required class="form-control">
                    <label for="item_discription" class="mt-2">Mavzu haqida</label>
                    <textarea name="item_discription" class="form-control" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bekor qilish</button>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
