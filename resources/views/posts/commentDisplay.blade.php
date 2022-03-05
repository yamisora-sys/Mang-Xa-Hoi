
@foreach($comments as $comment)
    <div class="d-flex flex-row mb-2" @if($comment->parent_id != null) style="margin-left:40px;" @endif> 
        <img src="https://play-lh.googleusercontent.com/ObdbSatQvNUymufVs3vL5YmhGdvs3w5vvTciaGLFQOZoREVAEIIueioFOrWk9je_fqxR" width="40" class="rounded-image">
            <div class="d-flex flex-column ml-2"> <span class="name">{{ $comment->user->name }}</span> <small class="comment-text cormonrant-garamond">{{ $comment->body }}</small>
            <div class="d-flex flex-row align-items-center status">
                <small>Like</small>
                <small id="reply" role="button">Reply</small>
                <small>Translate</small>
                <small>{{date('d/m/y H:i', strtotime($comment->created_at))}}</small>
            </div>
        </div>
    </div>
    
    @include('posts.commentDisplay', ['comments' => $comment->replies])
@endforeach

<!-- <div id="reply-form">
    <form method="post" action="{{ route('comment.store') }}" >
        @csrf
        <div class="form-group">
            <div class="comment-input"> 
                <input type="text" class="form-control" name=body placeholder="Add your comment. Enter to post comment">
                <input type=hidden name=post_id value="{{ $post->id }}" />
                <input type=hidden name=parent_id value="{{ $comment->id }}" />
                <div class="fonts"> <i class="fa fa-paper-plane" aria-hidden="true" type=submit></i> </div>
            </div>
        </div>
    </form>
    </div> -->

<style>
    .cormonrant-garamond {
        font-family: 'Cormorant Garamond', serif;
        text-align: justify;
    }
</style>

