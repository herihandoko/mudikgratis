@php
$page_title =  'Service';
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: inner-header Start -->
            <section class="page-title divider layer-overlay overlay-theme-colored2-8 section-typo-light bg-img-center"
                data-tm-bg-img="images/bg/bg7.jpg">
                <div class="container pt-90 pb-90">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title text-white">{{trans('frontend.Service Details')}}</h2>
                                <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                                    <div class="breadcrumbs">
                                        <span class="trail-item trail-begin">
                                            <a href="javascript::void()"><span>{{trans('frontend.Home')}}</span></a>
                                        </span>
                                        <span><i class="fa fa-angle-right"></i></span>
                                        <span class="trail-item"><a href=""><span>{{trans('frontend.Service')}}</span></a></span>
                                        <span><i class="fa fa-angle-right"></i></span>
                                        <span class="trail-item trail-end text-theme-colored1">{{trans('frontend.Details')}}</span>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: inner-header End -->
            <!-- Section: Service details -->
            <section>
                <div class="container pb-90">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="sidebar">
                                    <div class="tm-sidebar-nav-menu-style2">
                                        <div class="widget widget_nav_menu">
                                            <ul>
                                                @foreach (@App\Models\Service::all() as $item)
                                                    <li class="{{ActiveMenu($item->slug, 2)}}"><a href="{{route('service_show', ['slug' => $item->slug])}}">{{$item->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <img  class="w-100" src="{{asset($service->image)}}" alt="{{getAlterTag($service->image)}}"/>
                                <h3 class="mt-30 mb-10">{{$service->title}}</h3>
                                <p class="lead">
                                    {!! showHtml($service->description) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Divider -->
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
