<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('frontend.index')}}">{{$blogable->options->blog_title}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

          @foreach($blogable->menus->nav1 as $menu)
            <li class="nav-item">
                <a class="nav-link" href="{{$menu->url}}" {{$menu->url_type==1 ? "target='_blank'":""}}>{{$menu->name}}</a>

           @if(isset($menu->sub_menus))
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($menu->sub_menus as $sub)
                            <a class="dropdown-item" href="{{$sub->url}}">{{$sub->name}}</a>
                            @endforeach
                        </div>
           @endif
            </li>
          @endforeach
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{route("frontend.search")}}">
            <input class="form-control mr-sm-2" type="search"  name="q" placeholder="Search" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>