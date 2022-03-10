
@foreach($comments as $comment)
    <div class="d-flex flex-row mb-2" @if($comment->parent_id != null) style="margin-left:40px;" @endif> 
        <img src="https://play-lh.googleusercontent.com/ObdbSatQvNUymufVs3vL5YmhGdvs3w5vvTciaGLFQOZoREVAEIIueioFOrWk9je_fqxR" width="40" class="rounded-image">
            <div class="d-flex flex-column ml-2"> <span class="name">{{ $comment->user->name }}</span> <small class="comment-text cormonrant-garamond">{{ $comment->body }}</small>
            <div class="d-flex flex-row align-items-center status">
                    <small><likecmt-component :comment="{{ $comment->id }}"></likecmt-component></small>
                    <small><dislikecmt-component :comment="{{ $comment->id }}"></dislikecmt-component></small>
                <small id="reply" role="button">Reply</small>
                <small>{{date('d/m/y H:i', strtotime($comment->created_at))}}</small>
            </div>
        </div>
    </div>
    
    @include('posts.commentDisplay', ['comments' => $comment->replies])
@endforeach