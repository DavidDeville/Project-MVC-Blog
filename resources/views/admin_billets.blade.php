@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
        @csrf
            <div class="card">
                <div class="card-header"><a href=""></a>Les billets des utilisateurs</div>
                <div class="card-body">
                    @foreach($billets as $billet)
                <p class="card-text">Billet publié par : {{ $billet->user->username }} le {{ $billet->created_at }}</p>    
                    <p class="card-text">{{ $billet->content }}</p>
                    <p>-----------------------------------------</p>
                    @endforeach
                    {{ $billets->links() }}
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
