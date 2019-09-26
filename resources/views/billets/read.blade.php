@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @csrf
        @if(isset($posts))
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->content }}</p>
                    <footer class="blockquote-footer">Tags : {{ $post->tags }}</footer><br>
                    @if($current_user == $post->user_id)
                    <form method="post" action="{{ route('billets_delete', ['id' => $post->id])}}">  
                    @csrf
                        <button class="btn btn-outline-danger">{{ __('Effacer article') }}</button>
                    </form>
                    <br>
                    {{-- <form method="post" action="{{ route('edit_display', ['id' => $post->id])}}">  
                    @csrf --}}
                        <button class="btn btn-outline-danger"><a href="{{ route('edit_display', ['id' => $post->id])}}">{{ __('Editer article') }}</a></button>
                    {{-- </form> --}}
                    @endif
                    <br>
                    <div class="blockquote-footer">{{ $post->created_at->format('d M Y') }}</div>
                    <div class="blockquote-footer">{{ $post->updated_at->format('d M Y') }}</div>
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
