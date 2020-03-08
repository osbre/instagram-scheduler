@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
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
                    <td>w</td>
                    <td class="bg-primary">
                        <span class="badge badge-pill badge-primary">
                            {{ $post->status }}
                        </span>
                    </td>
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
