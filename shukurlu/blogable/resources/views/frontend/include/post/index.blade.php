

    <div class="card" style="">
        <img src="https://dummyimage.com/600x200/0f8e9f/fff" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->text}}</p>
            <div class="blogable-post">
                <div class="blogable-post__author"><span class="fa fa-user"></span> <span>Posted By {{$post->user->name}}</span></div>
                <div class="blogable-post__date"><span class="fa fa-clock"></span>  <span>08.01.2019 16:36</span></div>
            </div>

           @if($blogable->widgets->facebook_comment->is_active)
            <div class="fb-comments" data-href="{!! url()->current() !!}" data-numposts="5"></div>
           @endif
        </div>
    </div>
