@extends('layouts.posts')

@section('content')
    <div class="row">
        @foreach($posts as $post)

            <div class="post col-md-4">
                <div class="post-thumbnail">
                    <img src="/img/blog-{{rand(1, 7)}}.jpg" alt="..." class="img-fluid">
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date"></div>
                        <div class="category"><a href="#"></a></div>
                    </div>
                    <h3 class="h4">{{$post->getTitle()}}</h3>
                    <a href="{{route('posts.comments', ['id' => $post->getId()])}}">
                        <p class="text-muted">Click to read more.</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->render() }}
@endsection
