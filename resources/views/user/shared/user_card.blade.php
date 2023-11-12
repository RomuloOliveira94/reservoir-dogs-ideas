<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img width="150px" height="150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="{{ $user->name }} avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ '@' . $user->name }}</span>
                </div>
            </div>
            <div>
                @can('update', $user)
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                @endcan
            </div>
        </div>
        @if ($editing_profile ?? false)
            <div class="mt-4">
                <label for="image">Profile picture</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        @endif
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('user.shared.user_stats')
            @auth
                @if (Auth::user()->isNot($user))
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-sm mb-2"> Unfollow </button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="post">
                                @csrf
                                <button class="btn btn-primary btn-sm mb-2"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
