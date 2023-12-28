@php
$page_title =  'Portfolio';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <dl class="description-list">
                                <dt>{{trans('frontend.Client')}}:</dt>
                                <dd>{{$portfolio->client}}</dd>
                                <dt>{{trans('frontend.Location')}}:</dt>
                                <dd>{{$portfolio->location}}</dd>
                                <dt>{{trans('frontend.Category')}}:</dt>
                                <dd>{{$portfolio->category}}</dd>
                                <dt>{{trans('frontend.Start Date')}}:</dt>
                                <dd>{{$portfolio->start_date}}</dd>
                                <dt>{{trans('frontend.End Date')}}:</dt>
                                <dd>{{$portfolio->end_date}}</dd>
                                <dt>{{trans('frontend.Website')}}:</dt>
                                <dd>{{$portfolio->website}}</dd>
                                <dt class="mb-20">{{trans('frontend.Share')}}:</dt>
                                <dd>
                                    <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                                        <li><a class="fb_icon_color" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" data-tm-bg-color="#3B5998"><i class="fab fa-facebook"></i></a></li>
                                        <li><a class="twitter_icon_color" href="http://www.twitter.com/share?url={{url()->current()}}" data-tm-bg-color="#02B0E8" ><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="vk_icon_color" href="https://vk.com/share.php?url={{url()->current()}}" data-tm-bg-color="#4C75A3"><i class="fab fa-vk"></i></a></li>
                                        <li><a class="linkedin_icon_color" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}" data-tm-bg-color="#4C75A3" ><i class="fab fa-linkedin"></i></a></li>
                                      </ul>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-8">
                            <img src="{{asset($portfolio->image)}}" alt="{{getAlterTag($portfolio->image)}}">
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-md-12">
                            <h4 class="mt-0">{{$portfolio->title}}</h4>
                           {!! clean($portfolio->description) !!}
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-md-12">
                            <h4 class="mb-20">{{trans('frontend.Recent Projects')}}</h4>
                            <div class="tm-sc-portfolio tm-sc-portfolio-masonry portfolio-style2-simple tm-owl-carousel-3col"
                                data-dots="true" data-nav="true">
                                @foreach (@App\Models\Portfolio::latest()->limit(6)->get() as $item)
                                <div class="item">
                                    <div class="tm-portfolio">
                                        <div class="tm-portfolio-inner">
                                            <div class="thumb">
                                                <a href="{{route('portfolio' ,['slug' => $item->slug ])}}">
                                                    <img width="672" height="448" src="{{asset($item->image)}}"
                                                         alt="{{getAlterTag($item->image)}}" />
                                                </a>
                                                <div class="d-none"></div>
                                            </div>
                                            <div class="tm-portfolio-content-wrapper">
                                                <div class="tm-portfolio-content">
                                                    <div class="tm-portfolio-content-inner">
                                                        <div class="title-holder">
                                                            <h5 class="title"><a
                                                                    href="{{route('portfolio' ,['slug' => $item->slug ])}}">{{$item->title}}
                                                                    </a></h5>
                                                        </div>
                                                        <div class="category-holder">
                                                            <div class="categories">{{$item->category}}</div>
                                                        </div>
                                                    </div>
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
            </section>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
