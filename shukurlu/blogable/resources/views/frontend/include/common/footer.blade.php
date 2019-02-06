<!-- Footer -->
<footer class="blogable-footer bg-light pt-4">

    <div class="container-fluid text-center text-md-left">

        <div class="row">

            <div class="col-md-6 mt-md-0 mt-3">

                <h5 class="text-uppercase">Footer Content</h5>
                <p>{{isset($blogable->options->footer_content) ? $blogable->options->footer_content : ""}}</p>

            </div>

            <hr class="clearfix w-100 d-md-none pb-3">

            <div class="col-md-3 mb-md-0 mb-3">

                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled">
                    @if(isset($blogable->menus->footer))
                    @foreach($blogable->menus->footer as $footer_item)
                    <li>
                        <a href="#">{{$footer_item->name}}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>

            </div>


        </div>


    </div>

    <div class="footer-copyright text-center py-3">{{isset($blogable->options->copyright) ?  $blogable->options->copyright : ""}}
    </div>
</footer>
