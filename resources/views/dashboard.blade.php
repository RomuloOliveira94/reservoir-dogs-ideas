@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_side_bar')
    </div>
    <div class="col-6">
        @include('shared.error_message')
        @include('shared.success_message')
        @include('shared.submit_idea')
        <hr>
        @foreach ($ideas as $idea)
        @include('shared.idea_card')
        @endforeach
        <div class="mt-3">
            {{$ideas->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search')
        @include('shared.follow_box')
    </div>
</div>
@endsection
