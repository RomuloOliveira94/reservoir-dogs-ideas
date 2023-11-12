<div class="mb-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="{{ route('users.show', $idea->user->id) }}"><img width="50px" height="50px"
                            class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                            alt="{{ $idea->user->name }} avatar">
                    </a>
                    <div>
                        <h5 class="card-title mb-0"><a
                                href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                        <a class="mx-1" href="{{ route('ideas.show', $idea->id) }}">Show</a>
                        @auth
                            @can('update', $idea)
                                @csrf
                                @method('delete')
                                <a class="mx-1" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                                <button class="btn btn-danger btn-sm">X</button>
                            @endcan
                        @endauth
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if ($editing ?? false)
                <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea class="form-control" id="idea" rows="3" name="idea">{{ $idea->idea }}</textarea>
                        @error('idea')
                            <span class="fs-5 ms-1 text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark btn-md"> Update </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->idea }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                @include('ideas.shared.like_button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }} </span>
                </div>
            </div>
            @include('ideas.shared.comments_box')
        </div>
    </div>
</div>
