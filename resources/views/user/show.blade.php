@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_side_bar')
        </div>
        <div class="col-6">
            @include('shared.error_message')
            @include('shared.success_message')
            <div class="mt-3">
                @include('user.shared.user_card')
            </div>
            <hr>
            @forelse ($ideas as $idea)
                @include('ideas.shared.idea_card')
            @empty
                <h2 class="text-center">No results Found</h2>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
