@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $posts->title }}</div>
                <div class="card-body">
                    <p class="card-text">{{ $posts->content }}</p>
                    <footer class="blockquote-footer">Tags : {{ $posts->tags }}</footer><br>
                    <br>
                    <div class="blockquote-footer">{{ date('Y-m-d', strtotime($posts->created_at)) }}</div>
                    @if(isset($posts->updated_at))
                    <div class="blockquote-footer">{{ date('Y-m-d', strtotime($posts->updated_at)) }}</div>
                    @endif
                </div>
                </div>
            <br>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @csrf
            <div class="card">
                <div class="card-header">Liste des commentaires</div>
                <div class="card-body">
                    @foreach($comments as $comment)
                <p class="card-text">{{ $comment->content }} / Commentaire envoyé par : {{ $comment->user->username }}</p>
                    <br>
                    @endforeach
                </div>
                </div>
            <br>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @csrf
            <div class="card">
                <div class="card-header">Ajouter un commentaire</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create_comment', ['id' => $posts->id]) }}">
                    @csrf
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Envoyer') }}
                    </button>
                    </form>
                    <br>
                </div>
                </div>
            <br>
            </div>
        </div>
    </div>
</div>
@endsection
