@php
$page_title =  $page->title;
@endphp
@extends('frontend.layouts.master')
@section('content')
    @include('cookieConsent::index')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            @foreach ($elements as $item)
                @include(@App\Models\PageComponent::find($item)->view , compact('page'))
            @endforeach
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
