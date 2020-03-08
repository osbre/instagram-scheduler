@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Action</th>
                <th scope="col">Text</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
                <th scope="col">Published at</th>
                <th scope="col">Created at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="border">
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-outline-info btn-block">Edit</a>
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post">
                            <input class="btn btn-outline-warning" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                    <td>
                        <pre class="text-white">{{ $post->body }}</pre>
                    </td>
                    <td class="bg-{{ $post->status_color }} text-uppercase text-center">
                        {{ $post->status }}
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
