@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">Contact</h4>
                        </div>
                        <div class="col-6" style="text-align:right">
                            @if($status=='true')
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Contakt add</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($status=='false')
                    <form action="{{ route('admin_contact_update', 1) }}" method="post">
                        @csrf 
                        @method('put')
                        <div class="row">
                            <div class="col-6">
                                <label for="email" class="mb-1">Email</label>
                                <input type="email" name="email" value="{{ $Contact['email'] }}" required class="form-control">
                                <label for="phone" class="my-1">Telefon raqam</label>
                                <input type="text" name="phone" value="{{ $Contact['phone'] }}" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="addres" class="mb-1">Addres</label>
                                <input type="text" name="addres" value="{{ $Contact['addres'] }}" required class="form-control">
                                <label for="video" class="my-1">Video Url</label>
                                <input type="text" name="video" value="{{ $Contact['video'] }}" required class="form-control">
                            </div>
                            <div class="col-12 pt-3 text-center">
                                <button type="submit" class="btn btn-primary w-50">O'zgarishlarni saqlash</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">Murojatlar</h4>
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
                                <th>Ismi</th>
                                <th>Telefon raqam</th>
                                <th>Murojat matni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ContactMessaga as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>{{ $item['discriotion'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('admin_contact_create') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="phone">Telefon raqam</label>
                    <input type="text" name="phone" required class="form-control">
                    <label for="email" class="mt-2">Email</label>
                    <input type="email" name="email" required class="form-control">
                    <label for="addres" class="mt-2">Addres</label>
                    <input type="text" name="addres" required class="form-control">
                    <label for="video" class="mt-2">Video URL</label>
                    <input type="text" name="video" required class="form-control">
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
