@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ __('Schedule post') }}</h1>

                @isset($is_published)
                    @if($is_published)
                        <div class="alert alert-primary" role="alert">
                            This post has already been published, so it makes no sense to edit it.
                        </div>
                    @endif
                @endisset

                @if ($errors->any())
                    <ul class="alert alert-danger list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ isset($post) ? route('posts.update', ['post' => $post]) : route('posts.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @isset($post)
                        @method('put')
                    @endisset

                    <div class="form-group">
                        <label for="published_at">Published at</label>
                        <input type="text" name="published_at" value="{{ $post->published_at ?? '' }}" class="form-control" id="published_at">
                        <script>
                            flatpickr("#published_at", {
                                enableTime: true,
                                defaultDate: '{{  $post->published_at ?? date('Y-m-d H:i:00') }}',
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="body">Text</label>
                        <textarea name="body" class="form-control" id="body" rows="10">{{ old('body') ?? $post->body ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        @include('posts._media', ['id' => 'preview'])
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input name="photo"
                                   type="file"
                                   class="custom-file-input"
                                   onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"
                                   id="photo">
                            <label class="custom-file-label bg-dark text-white" for="photo">
                                Choose
                                @if(isset($post) && $post->getFirstMedia())
                                    <span class="badge badge-info">NEW</span>
                                @endif
                                photo
                            </label>
                        </div>
                    </div>

                    <div class="btn-group btn-group-lg btn-block mb-2">
                        <button type="submit" class="btn btn-primary">
                            @isset($post)
                                Update
                            @else
                                Schedule
                            @endisset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
