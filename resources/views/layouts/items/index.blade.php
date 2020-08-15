@extends('layouts.master')

@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold float-left mt-3 text-dark">DAFTAR PERTANYAAN</h3>
            <a href="/questions/create" class="btn btn-success float-right card-title mt-3">Buat Pertanyaan Baru</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- <table class="table table-bordered">
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
                            <td> {{ strip_tags($post->body) }} </td>
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
            </table> -->
        
        @forelse($question as $key => $post)
            <div class="card mb-3 border-secondary">
              <div class="card-header bg-secondary">
                <h5 class="card-title text-white pt-2">Pertanyaan {{ $key+1 }}</h5>           
                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <h1>
                      <strong>{{ $post->title }}</strong>
                    </h1>
                    <h5>
                        {{ strip_tags($post->body) }}
                    </h5>                   
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h5 class="description-header"><a href="/questions/{{$post->id}}" class="btn btn btn-success btn-sm m-1">Show</a></h5>
                      <span class="description-text">DETAIL PERTANYAAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h5 class="description-header"><a href="/questions/{{$post->id}}/edit" class="btn btn-secondary btn-sm m-1">Edit</a></h5>
                      <span class="description-text">EDIT PERTANYAAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <h5 class="description-header">
                      <form action="/questions/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm m-1" value="Delete">
                                </form>
                      </h5>
                      <span class="description-text">HAPUS PERTANYAAN</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                    </div>
                  </div>  

                    </div>   
                </div>
            </div>
            @empty
            <div>
                Tidak ada pertanyaan
            </div>
            @endforelse
           

           
        </div>       
    </div>
</div>
@endsection