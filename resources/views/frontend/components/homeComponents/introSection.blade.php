@push('styles')
    <style>
        .service-thumb img {
            width: 200px !important;
            height: 200px !important;
            border-radius: 50px;
            border-radius: 100px;
            object-fit: cover;
        }

    </style>
@endpush
<!-- Section: About -->
<section class="our-about">
    <div class="container pt-sm-20 pt-md-40">
        <div class="section-content mt-md--0" data-tm-margin-top="-250px">
            <div class="feature-service-wrapper mb-90">
                <div class="row">
                    @foreach (@App\Models\Service::limit(3)->get() as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="tm-sc-service service-item-current-style1">
                                <div class="service-thumb-wrapper">
                                    <div class="service-thumb">
                                        <img src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}">
                                    </div>
                                    <div class="service-icon">
                                        <div class="icon">
                                            <i class="{{$item->icon}} text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h4 class="title service-title">{{$item->title}}</h4>
                                    <p>{{Str::words(removeTag($item->description), 9, ' ')}}</p>
                                    <a class="btn btn-theme-colored1 btn-view-details"
                                        href="{{route('service_show', ['slug' => $item->slug])}}">{{trans('frontend.Read More')}} ➞</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if (@App\Models\Intro::first())
            @foreach (@App\Models\Intro::first()->get() as $item)
                <div class="section-content">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about-box text-center">
                                <div class="thumb">
                                    <img src="{{asset($item->background)}}" alt="{{getAlterTag($item->background)}}">
                                </div>
                                <div class="help-details text-start">
                                    <div class="icon"><img
                                            src="{{asset('assets/frontend/images/icon/4.png')}}" ></div>
                                    <div class="content">
                                        <h5 class="hd-subtitle">{{$item->contact_title}}</h5>
                                        <p class="hd-title">{{$item->contact_subtitle}} <a
                                                class="text-theme-colored1"
                                                href="tel:{{$item->contact_number}}">{{$item->contact_number}}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="about-box-contents">
                                <div class="destails">
                                    <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                                    <h6 class="subtitle">{{$item->subtitle}}</h6>
                                    <h2 class="title">{{$item->title}}</h2>
                                    <p>{{$item->description}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="title-box">
                                            <h5 class="stitle"><i
                                                    class="fas fa-arrow-right mr-10 text-theme-colored1"></i>{{$item->item_one_title}}
                                            </h5>
                                            <p>{{$item->item_one_description}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="title-box">
                                            <h5 class="stitle"><i
                                                    class="fas fa-arrow-right mr-10 text-theme-colored1"></i>{{$item->item_two_title}}
                                            </h5>
                                            <p>{{$item->item_two_description}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div
                                            class="tm-sc-icon-box icon-box icon-left text-left iconbox-centered-in-responsive animate-icon-on-hover animate-icon-rotate-y mt-10 mb-50">
                                            <div class="icon-box-wrapper">
                                                <div class="icon-wrapper"> <a
                                                        class="icon icon-xl icon-gray icon-rounded">
                                                        <i class="{{$item->why_choose_us_icon}}"></i>
                                                    </a></div>
                                                <div class="icon-text">
                                                    <h5 class="icon-box-title">{{$item->why_choose_us_title}}</h5>
                                                    <div class="content">
                                                        <p>{{$item->why_choose_us_description}}</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <a href="{{$item->button_link}}"
                                            class="btn btn-theme-colored1 btn-flat btn-cp-effect text-uppercase">
                                            {{$item->button_text}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="tm-floating-objects">
        <span class="tm-animation-floating z-index--1"
            data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob1.png')}}" data-tm-width="459"
            data-tm-height="523" data-tm-top="0" data-tm-bottom="auto" data-tm-left="0" data-tm-right="auto"
            data-tm-opacity="-100px"></span>
        <span class="tm-animation-floating z-index--1"
            data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob2.png')}}" data-tm-width="624"
            data-tm-height="1094" data-tm-top="100" data-tm-bottom="auto" data-tm-left="auto" data-tm-right="0"
            data-tm-opacity="1"></span>
    </div>
</section>
