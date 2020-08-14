@extends('layouts.master')

@section('content')
<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Membuat Pertanyaan Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/questions" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Judul Pertanyaan</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', '' )}}" placeholder="Masukan Judul Pertanyaan">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Isi Pertanyaan</label>
                    <!-- <input type="text" class="form-control" name="body" id="body" value="{{ old('body', '' )}}" placeholder="Masukan Isi Pertanyaan"> -->
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10" placeholder="Masukan Isi Pertanyaan">
                        {{ old('body', '' )}}
                    </textarea>
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
                <button type="submit" class="btn btn-success">Ajukan Pertanyaan</button>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  var body = document.getElementById("body");
    CKEDITOR.replace(body,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
  CKEDITOR.config.removePlugins = 'elementspath';
  CKEDITOR.config.autoParagraph = false;
</script>
@endsection