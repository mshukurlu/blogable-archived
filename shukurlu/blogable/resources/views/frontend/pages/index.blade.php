@extends('blogable::frontend.layouts.main')
@section('content')

    <div class="col-md-8">
        <div class="post-area">

       @if(isset($blogable->allPosts))

       @foreach($blogable->allPosts as $post)

        @include('blogable::frontend.include.single_post')

       @endforeach
       @endif
        </div>
    </div>
       @include('blogable::frontend.include.common.sidebar')

@stop
