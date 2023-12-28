   @push('styles')
       <style>
           .author-thumb .rounded-circle {
               width: 72px !important;
               height: 72px;
               object-fit: cover;
           }
       </style>
   @endpush
   <section class="our-testimonials">
       <div class="container pt-lg-50">
           <div class="section-title">
               <div class="row justify-content-center">
                   <div class="col-lg-6">
                       <div class="tm-sc-section-title section-title text-center">
                           <div class="title-wrapper">
                               <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}" alt="Icon">
                               <h6 class="subtitle">{{trans('frontend.Company Testimonials')}}</h6>
                               <h2 class="title text-theme-colored2">{{trans('frontend.What They’re Saying')}}</h2>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="section-content">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="tm-sc-testimonials tm-sc-testimonials-carousel owl-dots-center owl-nav-outer">
                           <div class="owl-carousel owl-theme tm-owl-carousel-3col" data-dots="true"
                               data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300"
                               data-margin="30" data-stagepadding="0">
                               @foreach (@App\Models\Testimonial::all() as $item)
                                   <div class="tm-carousel-item">
                                       <div class="tm-sc-testimonials testimonials-style-current-theme">
                                           <div class="testimonial-text-holder">
                                               <div class="author-text">{{$item->comment}}</div>
                                               <div class="wrapper d-flex">
                                                   <div class="testimonial-image-holder">
                                                       <div class="author-thumb"> <img
                                                               src="{{asset($item->image)}}" class="rounded-circle">
                                                       </div>
                                                   </div>
                                                   <div class="testimonial-author-info-holder">
                                                       <h5 class="name">- {{$item->name}}</h5>
                                                       <p class="position">{{$item->designation}}</p>
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
           <span class="z-index--1 bg-img-cover" data-tm-bg-img="{{asset('assets/frontend/images/bg/bg5.jpg')}}"
               data-tm-width="100%" data-tm-height="544" data-tm-top="0" data-tm-bottom="auto" data-tm-left="0"
               data-tm-right="0" data-tm-opacity="-100px"></span>
       </div>
   </section>
