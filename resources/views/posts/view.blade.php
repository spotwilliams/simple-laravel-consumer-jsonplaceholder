@extends('layouts.posts')

@section('content')

    <article>
        <h1 class="post-title">
            {{$post->getTitle()}}
        </h1>
        <p>
            {{$post->getBody()}}
        </p>
    </article>
@endsection
