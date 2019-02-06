@extends('blogable::frontend.layouts.main')
@section('content')

    <div class="col-md-9">
    @include('blogable::frontend.include.post.index')
    </div>
    @include('blogable::frontend.include.common.sidebar')

@stop
@section('script')
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=470373439997695&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection