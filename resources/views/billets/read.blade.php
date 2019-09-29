@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @csrf
        @if(isset($posts))
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header"><a href="{{ route('display_comments', ['id' => $post->id])}}">{!! $post->title !!}</a></div>
                <div class="card-body">
                    <p class="card-text">{!! $post->content !!}</p>
                    <footer class="blockquote-footer">Tags : {!! $post->tags !!}</footer><br>
                    @if($current_user == $post->user_id || $user_type == 'admin')
                    <form method="post" action="{{ route('billets_delete', ['id' => $post->id])}}">  
                    @csrf
                        <button class="btn btn-outline-danger">{{ __('Effacer article') }}</button>
                    </form>
                    <br>
                    <button class="btn btn-outline-danger"><a href="{{ route('edit_display', ['id' => $post->id])}}">{{ __('Editer article') }}</a></button>
                    @endif
                    <br>
                    <div class="blockquote-footer">{{ $post->created_at}}</div>
                    @if(isset($post->updated_at))
                    <div class="blockquote-footer">{{ $post->updated_at}}</div><br>
                    @endif
                <div class="text-truncate">Nombre de commentaires : {{ $post->comments->count() }}</div>
                </div>
            </div>
            <br>
            @endforeach
            {{ $posts->links() }}
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
