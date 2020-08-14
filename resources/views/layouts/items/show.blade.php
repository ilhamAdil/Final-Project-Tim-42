@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Pertanyaan #{{$question->id}}
        <div class="d-flex flex-row-reverse bd-highlight float-right">
            <button class="btn btn-success btn-sm ml-2"> Diperbarui : {{$question->updated_at->format('d-m-Y H:i')}} </button>
            <button class="btn btn-success btn-sm ml-2"> Dibuat : {{$question->created_at->format('d-m-Y H:i')}} </button>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title font-weight-bold"> {{$question->title}} </h5>
        <p class="card-text"> {{$question->body}} </p><br>
        <div class="dropdown-divider"></div>
        <div class="mt-4">
            Author :
            <button class="btn btn-success btn-sm mr-3">{{ $question->author->name }}</button>
            Tags : 
            @forelse($question->tags as $tag)
                <button class="btn btn-outline-success btn-sm"> {{ $tag->tag_name }} </button>
            @empty
                No Tags
            @endforelse
        </div>
    </div>
</div>
@endsection