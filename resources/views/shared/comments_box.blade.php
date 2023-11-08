<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="comment[{{ $idea->id }}]" id="comment[{{ $idea->id }}]"></textarea>
            @error("comment.$idea->id")
                <span class="fs-5 ms-1 text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>

    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start mb-2">
            <a href="{{ route('users.show', $comment->user->id) }}"><img width="50px" height="50px"
                    class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                    alt="{{ $comment->user->name }} avatar">
            </a>
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class=""><a
                                href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                        </h6>
                        <p class="fs-6 mt-1 fw-light d-flex">
                            {{ $comment->content }}
                        </p>
                    </div>
                    <div class="d-flex flex-column inline-block">
                        <small class="fs-6 fw-light text-muted"> {{ $comment->created_at }}</small>
                        @auth
                            @if (auth()->user()->id === $comment->user_id)
                                <form class="d-flex justify-content-end"
                                    action="{{ route('ideas.comments.destroy', [
                                        'idea' => $idea->id,
                                        'comment' => $comment->id,
                                    ]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger w-1">X</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h5 class="text-center">No comments</h5>
    @endforelse
</div>
