@extends('layouts.app')

@section('content')
    <article>
        <h1 class="post-title">
            {{$post->getTitle()}}
        </h1>
        <p>
            {{$post->getBody()}}
        </p>
    </article>
    <h2>Comments</h2>
    @foreach($comments as $comment)
        <div class="post-preview">
            <p>
                {{$comment->getBody()}}
            </p>
            <p class="post-meta">
                by {{$comment->getName()}} - {{$comment->getEmail()}}
            </p>
        </div>
        <hr/>
    @endforeach
    {{ $comments->render() }}
@endsection
