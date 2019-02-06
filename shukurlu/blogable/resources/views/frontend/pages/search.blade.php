@extends('blogable::frontend.layouts.main')
@section('content')

    <div class="col-md-8">
        <div class="post-area">

            @if(isset($posts) && count($posts)>0)

                @foreach($posts as $post)

                    @include('blogable::frontend.include.single_post')

                @endforeach

            @else
                <h2>I am so sorry, not found </h2>
            @endif
        </div>
    </div>
    @include('blogable::frontend.include.common.sidebar')

@stop
