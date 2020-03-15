<a target="_blank" href="{{ isset($post) ? $post->getFirstMedia()->getUrl() : '' }}">
    <img src="{{ isset($post) ? $post->getFirstMedia()->getUrl() : '' }}"
         @isset($id)
         id="{{ $id }}"
         @endisset
         class="img-fluid">
</a>
