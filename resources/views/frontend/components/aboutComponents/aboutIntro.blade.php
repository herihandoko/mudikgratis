@if (@App\Models\About::count())
    @foreach (@App\Models\About::first()->get() as $item)
        <!-- Section: About -->
        <section class="border-bottom">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="about-box2 mb-md-60">
                                <div class="thumb">
                                    <img src="{{asset($item->background)}}" alt="{{getAlterTag($item->background)}}">
                                    <img class="floating-img"
                                        src="{{asset($item->foreground)}}" alt="{{getAlterTag($item->foreground)}}">
                                </div>
                                <div class="help-details2 d-flex align-items-center bg-theme-colored1">
                                    <div class="icon"><img
                                            src="{{asset('assets/frontend/images/icon/15.png')}}">
                                    </div>
                                    <div class="content">
                                        <h4 class="hd-subtitle">{{trans('frontend.We’re ready to assist you')}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="about-box-contents">
                                <div class="destails">
                                    <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                                    <h6 class="subtitle">{{$item->subtitle}}</h6>
                                    <h2 class="title">{{$item->title}}</h2>
                                    <p>{!! clean($item->description) !!}</p>
                                    <div class="ceo-thumb-singature d-flex align-items-center">
                                        <div class="ceo-thumb mr-20">
                                            <img class="rounded-circle"
                                                src="{{asset($item->avatar)}}" alt="{{getAlterTag($item->avatar)}}">
                                        </div>
                                        <div class="ceo-signature">
                                            <img src="{{asset($item->signature)}}" alt="{{getAlterTag($item->signature)}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-floating-objects">
                <span class="tm-animation-spin-half z-index--1"
                    data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob7.png')}}"
                    data-tm-width="220" data-tm-height="219" data-tm-top="6%" data-tm-bottom="auto" data-tm-left="5%"
                    data-tm-right="auto" data-tm-opacity="-100px"></span>
                <span class="tm-animation-floating z-index--1"
                    data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob8.png')}}"
                    data-tm-width="807" data-tm-height="939" data-tm-top="-200px" data-tm-bottom="auto"
                    data-tm-left="auto" data-tm-right="-200px" data-tm-opacity="1"></span>
            </div>
        </section>
    @endforeach
@endif
