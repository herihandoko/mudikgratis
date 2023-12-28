   @if (@App\Models\Blog::count())

   <!-- Section: Blog -->
   <section class="our-blog z-index-1">
    <div class="container pb-90">
      <div class="section-title">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="tm-sc-section-title section-title text-center">
              <div class="title-wrapper">
                <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                <h6 class="subtitle">{{trans('frontend.From the Blog Post')}}</h6>
                <h2 class="title text-theme-colored2">{{trans('frontend.News & Articles')}}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-content">
        <div class="row">


         @foreach (@App\Models\Blog::latest()->limit(3)->get() as $item)
         <div class="col-lg-6 col-xl-4">
            <div class="tm-sc-blog blog-style2-current-theme">
              <article class="post">
                <div class="entry-header">
                  <div class="post-thumb">
                    <div class="post-thumb-inner">
                      <div class="thumb">
                        <img class="img-fluid w-100" src="{{asset( $item->image )}}" alt="{{getAlterTag($item->image)}}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="entry-content">
                  <div class="entry-meta">
                    <span class="mr-15"><i class="far fa-user-circle"></i> {{trans('frontend.by Admin')}}</span>
                    <span><i class="far fa-comments"></i> {{$item->comments->count()}} {{trans('frontend.Comments')}}</span>
                  </div>
                  <h4 class="entry-title text-theme-colored2 mb-30"><a href="{{route('blog_show', ['slug' => $item->slug])}}">{{$item->title}}</a></h4>
                  <hr>
                  <div class="entry-footer mt-20 d-flex">
                    <div class="entry-date">{{ Carbon\Carbon::parse($item->created_a)->format('d M, Y ')}}</div>
                    <a class="read-more" href="{{route('blog_show', ['slug' => $item->slug])}}"><span class="fas fa-arrow-right"></span></a>
                  </div>
                </div>
              </article>
            </div>
          </div>

         @endforeach
        </div>
      </div>
    </div>
    <div class="tm-floating-objects">
      <span class="tm-animation-floating z-index--1" data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob6.png')}}" data-tm-width="496" data-tm-height="867" data-tm-top="100" data-tm-bottom="auto" data-tm-left="0" data-tm-right="auto" data-tm-opacity="1"></span>
    </div>
  </section>


   @endif

