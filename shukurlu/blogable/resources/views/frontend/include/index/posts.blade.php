

    <div class="card" style="">
        <img src="https://dummyimage.com/600x200/0f8e9f/fff" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{substr($post->text,0,250)}} {{ strlen($post->text)>250 ? "..." : "" }} </p>
            <a href="{{route('frontend.post',["slug"=>$post->slug])}}" class="btn btn-primary">Read More</a>
        </div>
    </div>

