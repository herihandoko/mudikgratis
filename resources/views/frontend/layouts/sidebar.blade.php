<div class="side-panel-body-overlay"></div>
<div id="side-panel-container" class="dark"
    data-tm-bg-img="{{asset('assets/frontend/images/side-push-bg.jpg')}}">
    <div class="side-panel-wrap">
        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="javascript::void()"><i
                    class="fa fa-times side-panel-trigger-icon"></i></a></div>
        <img class="logo mb-50 h_75" src="{{url(GetSetting('site_logo'))}}" alt="Logo" >
        <p>{{GetSetting('site_description')}}</p>
        <div class="widget">
            <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{trans('frontend.Latest News')}}</h4>
            <div class="latest-posts">
                @foreach (@App\Models\Blog::where('status', 1)->latest()->limit(4)->get() as $item)
                    <article class="post clearfix pb-0 mb-10">
                        <a class="post-thumb" href="{{route('blog_show', ['slug' => $item->slug])}}"><img
                                src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}"></a>
                        <div class="post-right">
                            <h5 class="post-title mt--0"><a
                                    href="{{route('blog_show', ['slug' => $item->slug])}}">{{$item->title}}</a>
                            </h5>
                            <p>{!! clean(Str::words(removeTag($item->description), 4)) !!}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="widget">
            <h5 class="widget-title widget-title-line-bottom line-bottom-theme-colored1"{{trans('frontend.Contact Info')}} /h5>
            <div class="tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
                <ul>
                    @foreach (@App\Models\FooterContactItem::all() as $item)
                        <li class="contact-name">
                            <div class="icon"><i
                                    class="{{$item->icon}} font-icon sm-display-block text-theme-colored1 mr-10"></i>
                            </div>
                            <div class="text">{{$item->content}}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
