@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">O'qituvchilar</h4>
                        </div>
                        <div class="col-6" style="text-align:right">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Yangi o'qituvchi</button>
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
                                <th>Image</th>
                                <th>O'qituvchi</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Messeger</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Techer as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><img src="../image/techer/{{ $item['techer_image'] }}" style="width:100px;height:100px;border-radius:50%"></td>
                                <td>{{ $item['techer_name'] }}</td>
                                <td>{{ $item['techer_title'] }}</td>
                                <td>{{ $item['techer_discription'] }}</td>
                                <td>
                                    <p class="p-0 m-0"><b class="p-0 m-0">Telegram: </b>{{ $item['telegram'] }}</p>
                                    <p class="p-0 m-0"><b class="p-0 m-0">Instagram: </b>{{ $item['instagram'] }}</p>
                                    <p class="p-0 m-0"><b class="p-0 m-0">Facebook: </b>{{ $item['facebook'] }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('admin_techer_update',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('put')
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">O'qituvchilar mavjud emas.</td>
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
    <form action="{{ route('admin_techer_story') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yangi o'qituvchi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="techer_name">O'qituvchi</label>
                    <input type="text" name="techer_name" required class="form-control">
                    <label for="techer_title" class="mt-2">Title</label>
                    <input type="text" name="techer_title" required class="form-control">
                    <label for="techer_image" class="mt-2">Rasmi (.jpg, .png, max 2MB)</label>
                    <input type="file" name="techer_image" required class="form-control">
                    <label for="telegram" class="mt-2">Telegram</label>
                    <input type="text" name="telegram" required class="form-control">
                    <label for="instagram" class="mt-2">Instagram</label>
                    <input type="text" name="instagram" required class="form-control">
                    <label for="facebook" class="mt-2">Facebook</label>
                    <input type="text" name="facebook" required class="form-control">
                    <label for="techer_discription" class="mt-2">O'qituvchi haqida</label>
                    <textarea name="techer_discription" class="form-control" required></textarea>
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
