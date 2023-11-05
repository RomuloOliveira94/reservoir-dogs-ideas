@auth
<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name="idea"></textarea>
            @error('idea')
                <span class="fs-5 ms-1 text-danger"> {{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest
    <h4>Please login to share ideas.</h4>
@endguest
