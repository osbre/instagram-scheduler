@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Text</th>
                <th scope="col">Image</th>
                <th scope="col">Published at</th>
                <th scope="col">Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <pre class="text-white">{{ $post->body }}</pre>
                    </td>
                    <td>
                        @include('posts._media')
                    </td>
                    <td>{{ $post->published_at->diffForHumans() }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
