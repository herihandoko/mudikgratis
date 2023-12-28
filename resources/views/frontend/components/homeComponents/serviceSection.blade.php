    <!-- Section: Case Study -->
    <section class="our-casestudy  ">
        <div class="container pb-0">
            <div class="section-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7 col-xl-5">
                        <div class="tm-sc-section-title section-title">
                            <div class="title-wrapper">
                                <img class="img-invert site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                                <h6 class="subtitle text-white">{{trans('frontend.Recently Closed Projects')}}</h6>
                                <h2 class="title text-white">{{trans('frontend.Explore Our Cases')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="tm-sc-testimonials home1-project-style tm-sc-testimonials-carousel owl-dots-center owl-nav-outer">
                        <div class="owl-carousel owl-theme tm-owl-carousel-4col" data-dots="true" data-nav="true"
                            data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300"
                            data-margin="10" data-stagepadding="0">
                            @foreach (@App\Models\Service::all() as $item)
                                <div class="tm-carousel-item">
                                    <div class="projects-current-theme1">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}"
                                                >
                                            <div class="details">
                                                <h3 class="title"><a
                                                        href="{{route('service_show', ['slug' => $item->slug])}}">{{$item->title}}</a>
                                                </h3>
                                                <div class="btn-view-details ">
                                                    <a href="{{route('service_show', ['slug' => $item->slug])}}"
                                                        class="btn btn-theme-colored1"> {{trans('frontend.Read More')}} ➞</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-floating-objects">
            <span class="z-index--1 bg-img-cover bg-theme-colored1"
                data-tm-width="100%" data-tm-height="444" data-tm-top="0" data-tm-bottom="auto" data-tm-left="0"
                data-tm-right="0" data-tm-opacity="-100px"></span>
        </div>
    </section>
