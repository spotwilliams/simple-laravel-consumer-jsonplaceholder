@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <div class="post-preview">
            <h3 class="post-title">
                {{$post->getTitle()}}
            </h3>
            <p class="post-meta">
                <a class="badge badge-secondary" href="{{route('posts.comments', ['id' => $post->getId()])}}">Read more </a>
            </p>
        </div>
        <hr/>
    @endforeach
    {{ $posts->render() }}
@endsection
