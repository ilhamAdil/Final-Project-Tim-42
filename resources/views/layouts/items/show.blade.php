@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <h5 class="card-title"> {{$question->title}} </h5>
        <p class="card-text"> {{$question->body}} </p>
    </div>
</div>
@endsection