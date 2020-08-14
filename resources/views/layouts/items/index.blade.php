@extends('layouts.app')

@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold float-left mt-3">DAFTAR PERTANYAAN</h3>
            <a href="/questions/create" class="btn btn-primary float-right card-title mt-3">Buat Pertanyaan Baru</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>JUDUL</th>
                        <th>ISI</th>
                        <th style="width: 40px">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($question as $key => $post)
                        <tr>
                            <td> {{ $key + 1 }} </td>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->body }} </td>
                            <td style="display:flex">
                                <a href="/questions/{{$post->id}}" class="btn btn btn-success btn-sm m-1">Show</a>
                                <a href="/questions/{{$post->id}}/edit" class="btn btn-secondary btn-sm m-1">Edit</a>
                                <form action="/questions/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm m-1" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" align="center"> NULL </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection