@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
        @csrf
            <div class="card">
                <div class="card-header"><a href=""></a>La liste des utilisateurs</div>
                <div class="card-body">
                    @foreach($users as $user)
                <p class="card-text">Nom d'utilisateur : {{ $user->username }} inscrit le {{ $user->created_at }}</p>  
                <p>Nom : {{ $user->name }}</p>
                <p>Prénom : {{ $user->lastname }}</p>
                <p>Mail: {{ $user->email }}</p>
                <p>Rôle actuel : {{ $user->type }}</p>
                <p>Modifier le rôle de l'utilisateur : </p>
                <form method="POST" action="{{ route('admin_modify') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <select id="type-select" name="users">
                        <option value="">--Please choose an option--</option>
                        <option value="blogueur">Blogueur</option>
                        <option value="commentateur">Commentateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Envoyer') }}
                    </button>
                </form>
                <p>-----------------------------------------</p>
                @endforeach
                {{ $users->links() }}
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
