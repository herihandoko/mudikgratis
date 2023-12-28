@php
$page_title =  'Shop';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: home -->
            <section id="home" >
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col">
                            <!-- START Home Slider REVOLUTION SLIDER 6.0.8 -->
                            <p class="rs-p-wp-fix"></p>
                            <rs-module-wrap class="shop-module-wrap" id="rev_slider_shop_1_wrapper" data-alias="shop-home" data-source="gallery"
                            >
                                <rs-module class="rs-module" id="rev_slider_shop_1"  data-version="6.0.8">
                                    <rs-slides>
                                        @foreach (@App\Models\ShopSlider::all() as $item)
                                            <rs-slide data-key="rs-{{ $item->id}}" data-title="Slide {{ $item->id}}"
                                                data-thumb="{{asset(MediaImage($item->background, 1))}}"
                                                data-anim="ei:d;eo:d;s:d;r:0;t:slotslide-horizontal;sl:d;">
                                                <img src="{{asset(MediaImage($item->background, 1))}}" title="1tp5"
                                                    width="1920" height="1080" data-bg="p:center bottom;"
                                                    data-parallax="off" class="rev-slidebg" data-no-retina alt="{{getAlterTag($item->background)}}">
                                                <rs-layer id="slider-3-slide-15-layer-14" data-type="text"
                                                    class="text-theme-colored1 font-current-theme1" data-rsp_ch="on"
                                                    data-xy="x:l,l,l,c;xo:50px,50px,40px,2px;yo:200px,224px,175px,305px;"
                                                    data-text="w:normal;s:26,20,18,17;l:34,36,30,30;fw:600;a:left,left,left,center;"
                                                    data-dim="w:auto,auto,auto,264px;h:42px,42px,38px,auto;"
                                                    data-frame_0="y:bottom;" data-frame_1="st:1260;sp:1000;sR:1260;"
                                                    data-frame_999="x:-50,-38,-28,-17;o:0;st:w;sp:1500;sR:6740;"
                                                    >
                                                    {{$item->main_heading}}
                                                </rs-layer>
                                                <rs-layer id="slider-3-slide-15-layer-19" data-type="text"
                                                    data-color="#333333" data-rsp_ch="on"
                                                    data-xy="x:l,l,l,c;xo:50px,50px,40px,0;yo:246px,270px,210px,345px;"
                                                    data-text="w:normal;s:78,52,48,42;l:91,64,56,48;fw:700;a:left,left,left,center;"
                                                    data-dim="w:652px,auto,auto,auto;h:189px,151px,126px,112px;"
                                                    data-frame_0="y:bottom;" data-frame_1="st:1700;sp:1000;sR:1700;"
                                                    data-frame_999="o:0;st:w;sp:1500;sR:6300;"
                                                    class="font-current-theme1">{{$item->sub_heading}}
                                                </rs-layer>
                                                <rs-layer id="slider-3-slide-15-layer-20" class="rev-btn bg-theme-colored1"
                                                    data-type="button" data-rsp_ch="on"
                                                    data-xy="x:l,l,l,c;xo:50px,50px,40px,0;yo:500px,454px,405px,525px;"
                                                    data-text="w:normal;s:20,15,14,14;f:left,none,none,none;c:both,none,none,none;l:40,30,22,16;fw:500;a:left,left,left,center;"
                                                    data-flcr="f:left,none,none,none;c:both,none,none,none;"
                                                    data-dim="minh:0px,none,none,none;"
                                                    data-padding="t:10,8,10,12;r:60,46,46,46;b:10,8,10,12;l:60,46,46,46;"
                                                    data-border="bor:5px,5px,5px,5px;" data-frame_0="y:bottom;"
                                                    data-frame_1="st:2500;sp:1000;sR:2500;"
                                                    data-frame_999="o:0;st:w;sp:1500;sR:5500;"
                                                    data-frame_hover="bgc:#007aff;bor:5px,5px,5px,5px;bri:120%;"
                                                    ><a href="{{$item->button_link}}"
                                                        class="text-white ">{{$item->button_text}}</a>
                                                </rs-layer>
                                                <rs-layer id="slider-3-slide-15-layer-22" data-type="shape" data-rsp_ch="on"
                                                    data-text="w:normal;s:20,15,11,6;l:0,19,14,8;" data-dim="w:100%;h:100%;"
                                                    data-basealign="slide" data-frame_0="x:-100%;" data-frame_0_mask="u:t;"
                                                    data-frame_1="sp:2000;" data-frame_1_mask="u:t;"
                                                    data-frame_999="x:-100%;o:0;st:w;sp:2000;" data-frame_999_mask="u:t;"
                                                    >
                                                </rs-layer>
                                                <rs-layer id="slider-3-slide-15-layer-31" class="rs-pxl-2"
                                                    data-type="image" data-rsp_ch="on"
                                                    data-xy="x:l,l,l,c;xo:755px,577px,417px,-2px;yo:105px,184px,125px,95px;"
                                                    data-text="w:normal;s:20,15,11,6;l:0,19,14,8;"
                                                    data-dim="w:588px,414px,368px,205px;h:442px,314px,268px,155px;"
                                                    data-frame_0="y:top;" data-frame_1="st:1350;sp:1000;sR:1350;"
                                                    data-frame_999="y:top;o:0;st:w;sp:2000;sR:6650;"><img
                                                        src="{{asset($item->foreground)}}" alt="{{getAlterTag($item->foreground)}}" data-no-retina>
                                                </rs-layer>
                                                <rs-layer id="slider-3-slide-15-layer-32" data-type="text"
                                                    data-color="#8e8e8e" data-rsp_ch="on"
                                                    data-xy="x:l,l,l,c;xo:50px,50px,40px,0;yo:445px,418px,340px,455px;"
                                                    data-text="w:normal;s:20,18,16,15;l:43,32,24,24;fw:600;a:left,left,left,center;"
                                                    data-dim="w:auto,auto,221px,auto;h:auto,auto,auto,35px;"
                                                    data-frame_0="y:bottom;" data-frame_1="st:2120;sp:1000;sR:2120;"
                                                    data-frame_999="x:-50,-38,-28,-17;o:0;st:w;sp:1500;sR:5880;"
                                                   >{{$item->discount_text}}
                                                </rs-layer>
                                            </rs-slide>
                                        @endforeach
                                    </rs-slides>
                                    <rs-progress class="rs-bottom rs-bottom-height"
                                    ></rs-progress>
                                </rs-module>
                            </rs-module-wrap>
                            <!-- END REVOLUTION SLIDER -->
                        </div>
                    </div>
                </div>
            </section>
            <section data-tm-bg-color="#f5f5f5">
                <div class="container pt-30 pb-30">
                    <div class="row">
                        @foreach (@App\Models\ShopService::all() as $item)
                            <div class="col-md-3">
                                <div class="tm-sc-icon-box icon-box icon-left iconbox-centered-in-responsive mb-lg-30">
                                    <div class="icon-box-wrapper">
                                        <a class="icon">
                                            <i class="{{$item->icon}}"></i>
                                        </a>
                                        <div class="icon-text">
                                            <h5 class="icon-box-title mt-0">{{$item->title}}</h5>
                                            <div class="content">
                                                <p>{{$item->subtitle}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="section-title text-center mb-30">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{trans('frontend.New Collection')}}</h2>
                                <p>{{trans('frontend.See what new products are available in online shop')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Isotope Filter -->
                            <div class="isotope-layout-filter filter-style-8 text-left cat-filter-default text-center"
                                data-link-with="product-gallery-holder-1111">
                                <a href="javascript::void()" class="active" data-filter="*">All</a>
                                @foreach (@App\Models\ProductCategory::all() as $item)
                                    <a href="javascript::void()"
                                        data-filter=".cat{{$item->id}}">{{$item->name}}</a>
                                @endforeach
                            </div>
                            <!-- End Isotope Filter -->
                            <!-- Isotope Gallery Grid -->
                            <div id="product-gallery-holder-1111"
                                class="isotope-layout grid-4 gutter-15 clearfix lightgallery-lightbox">
                                <div class="isotope-layout-inner">
                                    <!-- Isotope Item Start -->
                                    @foreach (@App\Models\Product::latest()->get() as $item)
                                        <div class="isotope-item cat{{$item->category_id}}">
                                            <div class="isotope-item-inner">
                                                <div class="product">
                                                    <div class="product-header">
                                                        <div class="thumb image-swap">
                                                            <a href="{{route('product', ['slug' => $item->slug])}}"><img
                                                                    src="{{asset(MediaImage($item->image, 1))}}"
                                                                    class="product-main-image img-responsive img-fullwidth"
                                                                    width="300" height="300" alt="{{getAlterTag($item->image)}}"></a>
                                                            <a href="{{route('product', ['slug' => $item->slug])}}"><img
                                                                    src="{{asset(MediaImage($item->image, 1))}}"
                                                                    class="product-hover-image img-responsive img-fullwidth"
                                                                    alt="{{getAlterTag($item->image)}}"></a>
                                                        </div>
                                                        <div class="product-button-holder">
                                                            <ul class="shop-icons">
                                                                <li class="item"><a href="javascript:void(0)"
                                                                        class="button btn-quickview"
                                                                        data-product="{{$item->slug}}"
                                                                        title="Product quick view"></a></li>
                                                                <li class="item"><a href="javascript:void(0)"
                                                                        onclick="addToCart({{$item->id}})"
                                                                        class="button tm-btn-add-to-cart">{{trans('frontend.Add to cart')}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <span class="product-categories"><a href="javascript::void()"
                                                                rel="tag">{{@$item->getCategory->name}}</a></span>
                                                        <h5 class="product-title"><a
                                                                href="{{route('product', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                                        </h5>
                                                        <span class="price">
                                                            @if ($item->discount_price)
                                                                <del><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->price}}</span></del>
                                                                <ins><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->discount_price}}</span></ins>
                                                            @else
                                                                <ins><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->price}}</span></ins>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Isotope Item End -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @foreach (@App\Models\ShopDiscount::all() as $item)
                <section class="divider bg-light">
                    <div class="container pt-40 pb-40">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <img alt="{{getAlterTag($item->image)}}" src="{{asset(MediaImage($item->image, 1))}}">
                            </div>
                            <div class="col-md-7 text-left">
                                <h4 class="mt-50 text-theme-colored1 mb-0">{{$item->main_heading}}</h5>
                                    <h1 class="mt-0">{{$item->sub_heading}}</h1>
                                    <h4 class="mt-10 text-gray">{{$item->discount_text}}</h4>
                                    <a href="{{$item->button_link}}"
                                        class="btn btn-theme-colored1 btn-round mt-20">{{$item->button_text}}</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach

            @if (@App\Models\OrderItem::count() > 0)

             <!-- Section: Shop  -->
             <section id="shop">
                <div class="container">
                    <div class="section-title text-center mb-50">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{trans('frontend.Best')}} <span class="text-theme-colored1">{{trans('frontend.Selling')}} </span> {{trans('frontend.Products')}}</h2>
                                <p {{trans('frontend.See our all time best products in online store')}}></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Isotope Gallery Grid -->
                            <div id="product-gallery-holder-2222"
                                class="isotope-layout grid-4 gutter-15 clearfix lightgallery-lightbox">
                                <div class="isotope-layout-inner">
                                    <!-- Isotope Item Start -->
                                    @php
                                        $products = @App\Models\OrderItem::select('item_id', DB::raw('sum(item_qty) as quantity'))
                                            ->groupBy('item_id')
                                            ->orderBy('quantity', 'Desc')
                                            ->limit('4')
                                            ->get();
                                    @endphp
                                    @foreach ($products as $item)
                                        <div class="isotope-item cat{{$item->item->category_id}}">
                                            <div class="isotope-item-inner">
                                                <div class="product">
                                                    <div class="product-header">

                                                        <div class="thumb image-swap">
                                                            <a
                                                                href="{{route('product', ['slug' => $item->item->slug])}}"><img
                                                                    src="{{asset(MediaImage($item->item->image, 1))}}"
                                                                    class="product-main-image img-responsive img-fullwidth"
                                                                    width="300" height="300" alt="{{getAlterTag($item->item->image)}}"></a>
                                                            <a
                                                                href="{{route('product', ['slug' => $item->item->slug])}}"><img
                                                                    src="{{asset(MediaImage($item->item->image, 1))}}"
                                                                    class="product-hover-image img-responsive img-fullwidth"
                                                                    {{getAlterTag($item->item->image)}}></a>
                                                        </div>
                                                        <div class="product-button-holder">
                                                            <ul class="shop-icons">
                                                                <li class="item"><a href="javascript:void(0)"
                                                                    class="button btn-quickview"
                                                                    data-product="{{$item->item->slug}}"
                                                                    title="Product quick view"></a></li>
                                                                <li class="item"><a href="javascript:void(0)"
                                                                        onclick="addToCart({{$item->item->id}})"
                                                                        class="button tm-btn-add-to-cart">{{trans('frontend.Add to cart')}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <span class="product-categories"><a href="javascript::void()"
                                                                rel="tag">{{@$item->item->getCategory->name}}</a></span>
                                                        <h5 class="product-title"><a
                                                                href="{{route('product', ['slug' => $item->item->slug])}}">{{$item->item->name}}</a>
                                                        </h5>
                                                        <span class="price">
                                                            @if ($item->item->discount_price)
                                                                <del><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->item->price}}</span></del>
                                                                <ins><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->item->discount_price}}</span></ins>
                                                            @else
                                                                <ins><span class="amount"><span
                                                                            class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->item->price}}</span></ins>
                                                            @endif
                                                        </span>
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
            </section>

            @endif


            @include(getFooter())
            <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="product-quickview" tabindex="-1" aria-labelledby="product-quickviewLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="quick-view-modal">
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                $('.btn-quickview').on('click', function() {
                    let product = $(this).attr('data-product')
                    $.ajax('{{route('product_quickview')}}', {
                        data: {
                            'product': product,
                        },
                        success: function(data) {
                            if (data) {
                                $("#product-quickview").modal('show');
                                $("#quick-view-modal").html(data);
                            }
                        }
                    });
                });
            </script>
        @endpush
        <!-- end wrapper -->
    @endsection
