@if (@App\Models\Service::count())
  <!-- Section: Case Study -->
  <section class="our-casestudy">
    <div class="container pb-80">
      <div class="section-title">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-xl-5">
            <div class="tm-sc-section-title section-title">
              <div class="title-wrapper text-center">
                <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                <h6 class="subtitle">{{trans('frontend.Recently Closed Projects')}}</h6>
                <h2 class="title">{{trans('frontend.Explore Our Cases')}}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="tm-sc-testimonials home1-project-style tm-sc-testimonials-carousel owl-dots-right owl-nav-outer">
              <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0">
                @foreach (@App\Models\Service::all() as $item)
                 <div class="tm-carousel-item">
                    <div class="projects-current-theme1">
                      <div class="thumb">
                        <img class="img-fullwidth" src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}">
                        <div class="details">
                          <h3 class="title"><a href="{{route('service_show', ['slug' => $item->slug] )}}">{{$item->title}}</a></h3>
                          <div class="btn-view-details">
                            <a href="{{route('service_show', ['slug' => $item->slug] )}}" class="btn btn-theme-colored1"> {{trans('frontend.Read More')}} ➞</a>
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
    </div>
    <div class="tm-floating-objects">
      <span class="z-index--1 bg-img-cover" data-tm-bg-img="{{asset('assets/frontend/images')}}/floating-objects/ob13.png" data-tm-width="625" data-tm-height="1094" data-tm-top="-245px" data-tm-bottom="auto" data-tm-left="0" data-tm-right="0" data-tm-opacity="-100px"></span>
    </div>
  </section>
@endif
