@extends('layout.app')

@section('content')
    @foreach($posts as $post)
        <div class="post-preview">
            <a href="{{route('posts.comments', ['id' => $post->getId()])}}">
                <h2 class="post-title">
                    {{$post->getTitle()}}
                </h2>
            </a>
        </div>
    @endforeach
@endsection
