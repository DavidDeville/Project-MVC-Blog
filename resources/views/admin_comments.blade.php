@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
        @csrf
            <div class="card">
                <div class="card-header"><a href=""></a>Les commentaires des utilisateurs</div>
                <div class="card-body">
                    @foreach($comments as $comment)
                <p class="card-text">Commentaire publié par : {{ $comment->user->username }} le {{ $comment->created_at }}</p>    
                    <p class="card-text">{{ $comment->content }}</p>
                    <p>-----------------------------------------</p>
                    @endforeach
                    {{ $comments->links() }}
                    <br>
                    <br>
                </div>
            </div>
            <br>
            </div>
        </div>
    </div>
</div>
@endsection
