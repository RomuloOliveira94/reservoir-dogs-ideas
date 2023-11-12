@extends('layout.layout')
@section('title', 'Idea')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_side_bar')
    </div>
    <div class="col-6">
        @include('shared.error_message')
        @include('shared.success_message')
        @include('ideas.shared.idea_card')
    </div>
    <div class="col-3">
       @include('shared.search')
       @include('shared.follow_box')
    </div>
</div>
@endsection
