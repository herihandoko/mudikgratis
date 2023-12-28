 @if (@App\Models\Statistic::count())
       <!-- Section: Divider -->
       <section class="bg-theme-colored2 z-index-1">
           <div class="container pt-60 pt-lg-120">
               <div class="section-content">
                   <div class="wrapper">
                       <div class="row">
                           <div class="col-xl-6">
                               <div class="about-statistics">
                                   <div class="thumb">
                                       <img src="{{asset(@App\Models\Statistic::first()->image)}}" alt="AboutImage" alt="{{getAlterTag(@App\Models\Statistic::first()->image)}}">
                                   </div>
                               </div>
                           </div>
                           <div class="col-xl-6">
                               <div class="statistics-content">
                                   <div class="wrapper">
                                       <img class="site-icon" src="{{asset(GetSetting('section_icon'))}}"  alt="Icon">
                                       <h6 class="subtitle">{{@App\Models\Statistic::first()->subtitle}}</h6>
                                       <h2 class="title">{{@App\Models\Statistic::first()->title}}</h2>
                                       <p class="para">{!! clean(@App\Models\Statistic::first()->description) !!}</p>
                                   </div>
                                   <div class="row">
                                       @foreach (@App\Models\StatisticItem::all() as $item)
                                           <div class="col-sm-6 p-0">
                                               <div class="statistics-funfact">
                                                   <div class="tm-sc-funfact funfact funfact-lefticon">
                                                       <div class="float-start">
                                                           <div class="funfact-icon">
                                                               <i class="{{$item->icon}} text-primary"></i>
                                                           </div>
                                                       </div>
                                                       <div class="details">
                                                           <h2 class="counter">
                                                               <span class="animate-number appeared" data-value="8080"
                                                                   data-animation-duration="1500">{{$item->title}}</span>
                                                           </h2>
                                                           <h5 class="title">{{$item->subtitle}}</h5>
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
           </div>
           <div class="tm-floating-objects d-none d-lg-block">
               <span class="tm-animation-floating z-index--1"
                   data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob5.png')}}" data-tm-width="559"
                   data-tm-height="559" data-tm-top="350" data-tm-bottom="auto" data-tm-left="-100px"
                   data-tm-right="auto" data-tm-opacity="1"></span>
               <span class="tm-animation-spin-half z-index-0"
                   data-tm-bg-img="{{asset('assets/frontend/images/floating-objects/ob4.jpg')}}" data-tm-width="308"
                   data-tm-height="301" data-tm-top="50" data-tm-bottom="auto" data-tm-left="auto" data-tm-right="96"
                   data-tm-opacity="1"></span>
           </div>
       </section>
@endif
