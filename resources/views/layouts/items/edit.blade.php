@extends('layouts.master')

@section('content')
<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Pertanyaan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/questions/{{$question->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Judul Pertanyaan</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $question->title )}}" placeholder="Masukan Judul Pertanyaan">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Isi Pertanyaan</label>
                    <input type="text" class="form-control" name="body" id="body" value="{{ old('body', $question->body )}}" placeholder="Masukan Isi Pertanyaan">
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control" name="tags" value="{{old('tags', '')}}" placeholder="Pisahkan dengan koma, contoh : php,laravel,javascript">
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Perbarui Pertanyaan</button>
            </div>
        </form>
    </div>
</div>
@endsection