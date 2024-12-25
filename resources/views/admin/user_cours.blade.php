@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-2">O'quvchilar</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foydalanuvchi</th>
                                <th>Kurs</th>
                                <th>Kursga azo bo'ldi</th>
                                <th>Azolik tugash vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($UserCours as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['cours_name'] }}</td>
                                    <td>{{ $item['start'] }}</td>
                                    <td>{{ $item['end'] }}</td>
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

@endsection
