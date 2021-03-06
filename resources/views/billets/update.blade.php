@extends('layouts.app')

@section('content')
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea.content',
        width: 330,
        height: 400
    });
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($currentuser == $posts->user_id || $user_type == 'admin')
                <div class="card-header">{{ __('Editer un article') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('edit', ['id' => $posts->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>
                            
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $posts->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Contenu') }}</label>
    
                                <div class="col-md-6">
                                <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror content" name="content">{!! $posts->content !!}</textarea>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $posts->tags }}" required autocomplete="tags">

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        @if(isset($success))
                            <div class="text-center" role="alert">
                                <strong>{{ $success }}</strong>
                            </div>
                            <br>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
                                </button>
                        </div>
                    </form>
                    @else
                    <div class="card-header">{{ __('Vue interdite') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
