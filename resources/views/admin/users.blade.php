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
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIO</th>
                                <th>Telefon raqam</th>
                                <th>Email</th>
                                <th>Ro'yhatdan o'tdi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Users as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
