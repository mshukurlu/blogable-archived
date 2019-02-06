<div class="p-3">
    <h4 class="font-italic">Categories</h4>
    <ol class="list-unstyled mb-0">
        @foreach($blogable->categories as $category)
        <li><a href="{{route("frontend.category",['slug'=>$category->slug])}}">{{$category->name}}</a></li>
        @endforeach
    </ol>
</div>