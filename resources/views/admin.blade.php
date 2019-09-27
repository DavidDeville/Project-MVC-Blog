@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            @csrf
                <div class="card">
                    <div class="card-header"><a href=""></a>Les 10 derniers utilisateurs</div>
                    <div class="card-body">
                        @foreach($users as $user)
                    <p class="card-text">Nom d'utilisateur : {{ $user->username }} et inscrit le {{ $user->created_at}}</p>    
                        {{-- <p class="card-text">{{ $comment->content }}</p> --}}
                        <p>-----------------------------------------</p>
                        @endforeach
                        <form method="post" action="">  
                        @csrf
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
                <br>
                </div>
        <div class="col-md-4">
        @csrf
            <div class="card">
                <div class="card-header"><a href=""></a>Les commentaires des utilisateurs</div>
                <div class="card-body">
                    @foreach($comments as $comment)
                <p class="card-text">Commentaire publié par : {{ $comment->user['username'] }} le {{ $comment->user['created_at']}}</p>    
                    <p class="card-text">{{ $comment->content }}</p>
                    <p>-----------------------------------------</p>
                    @endforeach
                    <form method="post" action="">  
                    @csrf
                    </form>
                    <br>
                    <br>
                </div>
            </div>
            <br>
            </div>
        <div class="col-md-4">
        @csrf
            <div class="card">
                <div class="card-header"><a href=""></a>Les billets des utilisateurs</div>
                <div class="card-body">
                    @foreach($billets as $billet)
                <p class="card-text">Billet publié par : {{ $billet->user['username'] }} le {{ $billet->user['created_at']}}</p>    
                    <p class="card-text">{{ $billet->content }}</p>
                    <p>-----------------------------------------</p>
                    @endforeach
                    <form method="post" action="">  
                    @csrf
                    </form>
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
