@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">Kurslar</h4>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Yangi Kurs</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kurs</th>
                                <th>O'qituvchi</th>
                                <th>Kurs narxi</th>
                                <th>Davomiyligi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Cours as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['cours_name'] }}</td>
                                <td>{{ $item['techer_name'] }}</td>
                                <td>{{ $item['lessin_price'] }}</td>
                                <td>{{ $item['lessin_davomiyligi'] }}</td>
                                <td>
                                    <a href="#" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin_cours_story') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yangi Kurs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="cours_name">Kursning nomi</label>
                    <input type="text" name="cours_name" required class="form-control">
                    <label for="cours_image" class="mt-2">Kurs rasmi (.jpg, .png, max 2MB)</label>
                    <input type="file" name="cours_image" required class="form-control">
                    <label for="lessin_time" class="mt-2">Kurs uzunligi (00:00:00)</label>
                    <input type="text" name="lessin_time" required class="form-control">
                    <label for="techer_name" class="mt-2">O'qituvchi</label>
                    <select name="techer_name" class="form-select">
                        <option value="">Tanlang</option>
                        @foreach($Techer as $item)
                            <option value="{{ $item['techer_name'] }}">{{ $item['techer_name'] }}</option>
                        @endforeach
                    </select>
                    <label for="lessin_daraja" class="mt-2">Kurs darajasi</label>
                    <input type="text" name="lessin_daraja" required class="form-control">
                    <label for="lessin_price" class="mt-2">Kurs narxi</label>
                    <input type="number" name="lessin_price" required class="form-control">
                    <label for="lessin_davomiyligi" class="mt-2">Darslar davomiyligi (kun)</label>
                    <input type="text" name="lessin_davomiyligi" required class="form-control">
                    <label for="cours_description" class="mt-2">Kurs haqida</label>
                    <textarea name="cours_description" class="form-control" required></textarea>
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
