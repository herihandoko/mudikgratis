<section>
    <div class="container">
        <div class="row tm-blog-sidebar-row">
            <div class="col-md-3">
                <div class="tm-sidebar-area mb-50">
                    <div class="sidebar-area-inner">
                        <div class="widget tm-widget-sticky-sidebar-in-parent mb-0"></div>
                        <div class="list-group">
                            @foreach (@App\Models\Faq::all() as $item)
                                <a href="#section-{{$item->id}}"
                                    class="list-group-item list-group-item-action smooth-scroll-to-target">{{$item->question}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @foreach (@App\Models\Faq::all() as $item)
                    <div id="section-{{$item->id}}" class="mb-50">
                        <h3>{{$item->question}}</h3>
                        <hr>
                        {{$item->answer}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
