<div>
    <form action="{{route('ideas.comments.store', $idea->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="comment[{{$idea->id}}]" id="comment[{{$idea->id}}]"></textarea>
            @error("comment.$idea->id")
                <span class="fs-5 ms-1 text-danger"> {{$message}}</span>
            @enderror
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>

    <hr>
    @foreach ($idea->comments as $comment)
    <div class="d-flex align-items-start mb-2">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
            alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">Luigi
                </h6>
                <small class="fs-6 fw-light text-muted"> {{$comment->created_at}}</small>
            </div>
            <p class="fs-6 mt-1 fw-light">
                {{$comment->content}}
            </p>
            <form action="{{route('ideas.comments.destroy', $comment->id, $idea->id)}}" method="POST">
                @csrf
                @method('delete')
                <button>Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
