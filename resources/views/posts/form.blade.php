<div class="add-comment">
    <div class="post col-md-12">
        <header>
            <h3 class="h6">Please add your thoughts!</h3>
        </header>

        <form action="{{ route('posts.create') }}" class="commenting-form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="postId" value="{{ old('postId') ?? isset($post)? $post->getId(): '' }}">
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="text" name="title" id="title" placeholder="Title"
                           value="{{ old('title') ?? isset($post)? $post->getTitle(): '' }}" class="form-control">
                </div>
                <div class="form-group col-md-12">
                                <textarea name="body" id="body" placeholder="Type your "
                                          class="form-control">{{ old('body') ?? isset($post)? $post->getBody(): '' }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-secondary">Save post</button>
                </div>
            </div>
        </form>
    </div>
</div>
<br/>
