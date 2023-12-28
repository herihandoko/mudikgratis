@php
$page_title =  'Blog search by tags';
@endphp
@php
use Illuminate\Support\Str;
@endphp
@push('styles')
    <style>
        .rounded-image {
            width: 85px !important;
            height: 85px !important;
            object-fit: cover;
        }
    </style>
@endpush
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">
            <!-- Section: page title -->
            <section class="page-title layer-overlay overlay-dark-9 section-typo-light bg-img-center"
                data-tm-bg-img="images/bg/bg1.jpg">
                <div class="container pt-50 pb-50">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title">{{trans('frontend.Blog Tag')}} ( {{request()->segment(3)}} )</h2>
                                <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                    <div class="breadcrumbs">
                                        <span><a href="javascript::void()" rel="home">{{trans('frontend.Home')}}</a></span>
                                        <span><i class="fa fa-angle-right"></i></span>
                                        <span><a href="javascript::void()">{{trans('frontend.Blog')}}</a></span>
                                        <span><i class="fa fa-angle-right"></i></span>
                                        <span class="active">{{trans('frontend.Tag')}}</span>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container mt-30 mb-30 pt-30 pb-30">
                    <div class="row">
                        <div class="col-md-9 sm-pull-none">
                            <div class="blog-posts">
                                @foreach ($blogs as $item)
                                    <article class="post clearfix mb-30 border-1px">
                                        <div class="row">
                                            <div class="col">
                                                <div class="entry-header">
                                                    <div class="post-thumb thumb">
                                                        <img src="{{url(MediaImage($item->image, 1))}}"
                                                            alt="{{getAlterTag($item->image)}}" class="img-responsive img-fullwidth">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="entry-content p-10">
                                                    <h4 class="entry-title mb-0"><a
                                                            href="{{route('blog_show', ['slug' => $item->slug])}}">{{$item->title}}</a>
                                                    </h4>
                                                    <div class="entry-meta">
                                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                class="far fa-calendar-alt mr-10 text-theme-colored1"></i>
                                                            {{Carbon\Carbon::parse($item->created_at)->format('d M, Y ')}}</span>
                                                        <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i
                                                                class="far fa-comments mr-10 text-theme-colored1"></i>
                                                            {{$item->comments->count()}}
                                                            {{trans('frontend.Comments')}}</span>
                                                    </div>
                                                    <p class="mt-10">{!! clean(Str::words(removeTag($item->description), 20)) !!}
                                                    </p>
                                                    <a href="{{route('blog_show', ['slug' => $item->slug])}}"
                                                        class="btn btn-plain-text-with-arrow">{{trans('frontend.Read more')}}</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                                <nav>
                                    {{$blogs->links()}}
                                </nav>
                                @if ($blogs->count() == 0)
                                <div  class="no-item d-flex align-items-center justify-content-center d-inline-block">
                                    <h3>{{trans('frontend.No Blogs Available!')}}</h3>
                               </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="sidebar sidebar-left mt-sm-30">
                                <div class="widget">
                                  <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{trans('frontend.Search Box')}}</h4>
                                  <form role="search" method="get" class="search-form" action="{{route('blog_search')}}">
                                    <input type="search" class="form-control search-field" placeholder="Search &hellip;" value="" name="query"/>
                                    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                                  </form>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{trans('frontend.Latest News')}}
                                    </h4>
                                    <div class="latest-posts">
                                        @foreach (@App\Models\Blog::where('status', 1)->latest()->limit(5)->get()
                                               as $item)
                                            <article class="post clearfix pb-0 mb-20">
                                                <a class="post-thumb"
                                                    href="{{route('blog_show', ['slug' => $item->slug])}}"><img
                                                        class="rounded-image" src="{{asset($item->image)}}"
                                                        alt="{{getAlterTag($item->image)}}"></a>
                                                <div class="post-right">
                                                    <h5 class="post-title mt-0"><a
                                                            href="{{route('blog_show', ['slug' => $item->slug])}}">{{$item->title}}</a></h5>
                                                    <span class="post-date">
                                                        <time
                                                            class="entry-date">{{Carbon\Carbon::parse($item->created_at)->format('d M, Y ')}}</time>
                                                    </span>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="widget widget_archive">
                                    <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{trans('frontend.Archive')}}
                                    </h4>
                                    <ul>
                                        @foreach (showArchive() as $date => $post)
                                            <li><a href='{{route('blog_archive', ['range' => $date])}}'>{{Carbon\Carbon::parse($date)->format('Y F')}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="widget widget_categories">
                                    <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">{{trans('frontend.Categories')}}
                                    </h4>
                                    <ul>
                                        @foreach (@App\Models\BlogCategory::all() as $item)
                                            <li class="cat-item"><a
                                                    href="{{route('blog_category', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                @if (getBlogTags())
                                    <div class="widget widget_tag_cloud">
                                        <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">
                                            {{trans('frontend.Tags')}}</h4>
                                        <div class="tagcloud">
                                            @foreach (getBlogTags() as $item)
                                                <a href="{{route('blog_tag', ['tag' => $item])}}"
                                                    class="tag-cloud-link">{{$item}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

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
