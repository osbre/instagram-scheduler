@isset($post)
    @if($post->getFirstMedia())
        <a target="_blank" href="{{ $post->getFirstMedia()->getUrl() }}">
            <img src="{{ $post->getFirstMedia()->getUrl() }}" class="img-fluid">
        </a>
    @endif
@endisset
