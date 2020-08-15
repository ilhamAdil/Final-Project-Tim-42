@extends('layouts.app')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        Pertanyaan #{{$question->id}}
        <div class="d-flex flex-row-reverse bd-highlight float-right">
            <button class="btn btn-success btn-sm ml-2"> Diperbarui : {{$question->updated_at->format('d-m-Y H:i')}} </button>
            <button class="btn btn-success btn-sm ml-2"> Dibuat : {{$question->created_at->format('d-m-Y H:i')}} </button>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title font-weight-bold"> {{$question->title}} </h5>
        <p class="card-text"> <?php echo $question->body ?> </p><br>
        <div class="dropdown-divider"></div>
        <div class="mt-4">
            Penanya :
            <button class="btn btn-success btn-sm mr-3">{{ $question->author->name }}</button>
            Tags : 
            @forelse($question->tags as $tag)
                <button class="btn btn-outline-success btn-sm"> {{ $tag->tag_name }} </button>
            @empty
                No Tags
            @endforelse

            <div class="float-right">
                <button class="btn btn-success btn-sm mr-3">Comments</button>
                <a href="#" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-thumbs-up"></i></a>
                <a href="#" class="btn btn-outline-danger btn-sm m-1"><i class="fas fa-thumbs-down"></i></a>
            </div>
        </div>
        
    </div>
</div>
<label for="isi" class="mt-4"><strong>Tambahkan Jawaban</strong></label>
<form action="" class="form-group mt-3">
    <textarea name="body" id="body" class="form-control" cols="30" rows="10" placeholder="Masukan jawaban anda"></textarea>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>


@endsection