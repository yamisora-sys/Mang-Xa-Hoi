
@foreach($comments as $comment)
    
    <div class="d-flex flex-row mb-2"> <img src="https://play-lh.googleusercontent.com/ObdbSatQvNUymufVs3vL5YmhGdvs3w5vvTciaGLFQOZoREVAEIIueioFOrWk9je_fqxR" width="40" class="rounded-image">
            <div class="d-flex flex-column ml-2"> <span class="name">{{ $comment->user->name }}</span> <small class="comment-text">{{ $comment->body }}</small>
            <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
        </div>
    </div>
@endforeach
