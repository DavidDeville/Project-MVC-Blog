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
                <p>Le type de l'utilisateur est : {{ $user->type }}</p>
                <p>Valeur du status : {{$user->status}}</p>
                <p>Bloquer ou débloquer l'utilisateur : </p>
                    <form method="POST" action="{{ route('admin_banhammer') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <select id="block-select" name="user_status">
                            <option value="">--Please choose an option--</option>
                            <option value="1">Bloquer</option>
                            <option value="0">Débloquer</option>
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
