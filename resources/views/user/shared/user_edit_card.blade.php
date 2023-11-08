<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img width="150px" height="150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="{{$user->name}} avatar">
                    <div>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="image">Profile picture</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="bio" rows="3" name="bio">{{$user->bio}}</textarea>
                    @error('bio')
                        <span class="fs-5 ms-1 text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark btn-sm mb-3"> Save </button>
                <@include('user.shared.user_stats')
            </div>
        </form>
    </div>
</div>
