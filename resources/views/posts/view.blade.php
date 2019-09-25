@extends('layouts.posts')

@section('content')

    <div class="container">
        <div class="post-single">
            {{--            <div class="post-thumbnail"><img src="img/blog-post-3.jpeg" alt="..." class="img-fluid"></div>--}}
            <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                    {{--                    <div class="category"><a href="#">Business</a><a href="#">Financial</a></div>--}}
                </div>
                <h1>{{$post->getTitle()}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                </div>
                <div class="post-body">
                    <p class="lead">{{ $post->getBody() }}</p>
                </div>
                <div class="post-comments">
                    <header>
                        <h3 class="h6">Post Comments<span class="no-of-comments">({{ $comments->count() }})</span></h3>
                    </header>
                    @foreach($comments as $comment)
                        <div class="comment">
                            <div class="comment-header d-flex justify-content-between">
                                <div class="user d-flex align-items-center">
                                </div>
                                <div class="title"><strong>{{ $comment->getEmail() }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="comment-body">
                            <p>{{ $comment->getBody() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="add-comment">
                <header>
                    <h3 class="h6">Leave a reply</h3>
                </header>
                <form action="{{ route('comments.create') }}" class="commenting-form" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="postId" value="{{ $post->getId() }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" id="name" placeholder="Name"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" id="email"
                                   placeholder="Email Address (will not be published)" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                                <textarea name="body" id="body" placeholder="Type your comment"
                                          class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-secondary">Submit Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
