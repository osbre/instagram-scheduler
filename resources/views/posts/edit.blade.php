@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ __('Schedule post') }}</h1>

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="published_at">Published at</label>
                        <input type="text" name="published_at" value="{{ $post->published_at ?? '' }}" class="form-control" id="published_at">
                        <script>
                            flatpickr("#published_at", {
                                enableTime: true,
                                defaultDate: '{{  date("Y-m-d H:i:00") }}',
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="body">Text</label>
                        <textarea name="body" class="form-control" id="body" rows="10">{{ $post->body ?? '' }}</textarea>
                    </div>

                    @include('posts._media')

                    <div class="form-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label bg-dark text-white" for="photo">
                                Choose
                                @if(isset($post) && $post->getFirstMedia())
                                    <span class="badge badge-info">NEW</span>
                                @endif
                                photo
                            </label>
                        </div>
                    </div>

                    <div class="btn-group btn-group-lg btn-block">
                        {{--                                <button type="submit" class="btn btn-dark">Publish now</button>--}}
                        <button type="submit" class="btn btn-primary">Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
