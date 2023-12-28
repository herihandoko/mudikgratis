@php
use Illuminate\Support\Str;
@endphp
@php
$page_title =  $blog->title;
$content_type = 'article';
$content_tags = $blog->tags;
$content_image = asset($blog->image);
$content_url = url()->current();
$description =  clean(Str::words(removeTag($blog->description) , '25'));
@endphp
@push('links')
@endpush
@push('styles')
    <style>
        .rounded-image {
            width: 85px !important;
            height: 85px !important;
            object-fit: cover;
        }
        .media {
            display: flex;
            background: #f4f5f8;
            padding: 10px;
            border-radius: 10px;
        }
        .media .date {
            font-weight: 700;
            color: #092a49;
            font-size: 14px;
        }
        .media img {
            margin-right: 10px;
            width: 50px !important;
            height: 50px !important;
            border: 3px solid #fffcfc;
            border-radius: 25px;
        }
        .media-body {
            width: 100%;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
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
            <!-- Section: inner-header Start -->
            <section class="page-title divider layer-overlay overlay-theme-colored2-8 section-typo-light bg-img-center"
                data-tm-bg-img="images/bg/bg7.jpg">
                <div class="container pt-90 pb-90">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="title text-white">{{trans('frontend.Blog Details')}}</h2>
                                <nav role="navigation" class="breadcrumb-trail breadcrumbs">
                                    <div class="breadcrumbs">
                                        <span class="trail-item trail-begin">
                                            <a href="javascript::void()"><span>{{trans('frontend.Home')}}</span></a>
                                        </span>
                                        <span><i class="fa fa-angle-right"></i></span>
                                        <span class="trail-item"><a href="javascript::void()"><span>{{trans('frontend.Blog')}}</span></a></span>
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
            <!-- Section: Blog -->
            <section>
                <div class="container pb-80">
                    <div class="row">
                        <div class="col-lg-8 col-xl-9">
                            <div class="blog-posts single-post">
                                <article class="post clearfix mb-0">
                                    <div class="entry-header mb-30">
                                        <div class="post-thumb thumb"> <img src="{{asset($blog->image)}}" alt="{{getAlterTag($blog->image)}}"
                                                class="img-responsive img-fullwidth"> </div>
                                        <h3 class="mt-30">{{$blog->title}}</h3>
                                        <div class="entry-meta mt-0">
                                            <span class="mb-10 text-gray mr-10 font-size-17"><i
                                                    class="far fa-calendar-alt mr-10 text-theme-colored1"></i>
                                                {{Carbon\Carbon::parse($blog->created_a)->format('d M, Y ')}}</span>
                                            <span class="mb-10 text-gray mr-10 font-size-17"><i
                                                    class="far fa-comments mr-10 text-theme-colored1"></i>
                                                {{$blog->comments()->where(['status' => 1])->count()}} {{trans('frontend.Comments')}}</span>
                                        </div>
                                        <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                                            <li><a class="fb_icon_color" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" data-tm-bg-color="#3B5998" ><i class="fab fa-facebook"></i></a></li>
                                            <li><a class="twitter_icon_color" href="http://www.twitter.com/share?url={{url()->current()}}" data-tm-bg-color="#02B0E8"><i class="fab fa-twitter"></i></a></li>
                                            <li><a class="vk_icon_color" href="https://vk.com/share.php?url={{url()->current()}}" data-tm-bg-color="#4C75A3"><i class="fab fa-vk"></i></a></li>
                                            <li><a class="linkedin_icon_color" href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->current()}}" data-tm-bg-color="#4C75A3" ><i class="fab fa-linkedin"></i></a></li>
                                          </ul>
                                    </div>
                                    <div class="entry-content">
                                        {!! showHtml($blog->description) !!}
                                    </div>
                                </article>

                                @if ($blog->comment_status == 1)
                                @foreach ($blog->comments()->where(['status' => 1])->get() as $item)
                                @if ($loop->first)
                                    <h3>{{trans('frontend.Read more')}}</h3>
                                @endif
                                <div class="media mb-4">
                                    <img class="mr-3" src="{{asset('assets/frontend/images/user.png')}}">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0">{{$item->name}}</h5>
                                        <p class="mb-0 date">
                                            {{Carbon\Carbon::parse($item->created_a)->format('d M, Y ')}} </p>
                                        {{$item->comment}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="comment-box mt-30">
                                <h3>Leave a Comment</h3>
                                <form role="form" method="POST"
                                    action="{{route('blog_comment', ['blog' => $blog->id])}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 pt-0 pb-0">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" required name="name"
                                                    id="contact_name" placeholder="Enter Name">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" required class="form-control" name="email"
                                                    id="contact_email2" placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" placeholder="Enter Phone"
                                                    class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <textarea class="form-control" required name="comment"
                                                    id="contact_message2" placeholder="Enter Message"
                                                    rows="7"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-theme-colored1 m-0">{{trans('frontend.Submit')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                @endif



                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-3 sidebar-area sidebar-right">
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
            <!-- End Divider -->
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection
