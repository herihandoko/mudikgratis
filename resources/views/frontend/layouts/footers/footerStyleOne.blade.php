  <!-- Footer -->
  <footer id="footer" class="footer consilt-footer bg-theme-colored2">
      <div class="footer-widget-area">
          <div class="container pt-100 pb-70">
              <div class="row">
                  <div class="col-md-6 col-xl-4 p-0 pl-lg-15 pr-lg-15">
                      <div class="widget tm-widget-contact-info">
                          <h4 class="widget-title">{{ trans('Statistik Pengunjung') }}</h4>
                          <div class="description">
                                <?php $totalVisitor = 0; ?>
                              <p>
                                  Pengunjung Hari Ini : {{ number_format(@App\Models\Visitor::where('date_visit', date('Y-m-d'))->count() + $totalVisitor) }} <br>
                                  Pengunjung Kemarin : {{ number_format(@App\Models\Visitor::where('date_visit', date('Y-m-d',strtotime("-1 days")))->count() + ($totalVisitor * 2)) }} <br>
                                  Pengunjung Bulan Ini : {{ number_format(@App\Models\Visitor::whereMonth('date_visit', date('m'))->whereYear('date_visit', date('Y'))->count() + ($totalVisitor * 15)) }} <br>
                                  Total Hits : {{ number_format(@App\Models\Visitor::count() + ($totalVisitor * 100)) }} <br>
                                  Total Pengunjung : {{ number_format(@App\Models\Visitor::count() + ($totalVisitor * 100)) }} <br>
                              </p>
                          </div>
                          <hr>
                          <ul
                              class="styled-icons icon-white icon-md icon-hover-theme-colored1 icon-circled clearfix mt-30">
                              @foreach (@App\Models\SocialLink::where('on_footer', 1)->get() as $item)
                                  <li><a class="social-link" href="{{ $item->link }}"><i class="{{ $item->icon }}"></i></a></li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  {{-- <div class="col-md-6 col-xl-4 p-0 pl-lg-15 pr-lg-15">
                      <div class="widget tm-widget-contact-info">
                          <h4 class="widget-title">{{trans('About')}}</h4>
                          <div class="description">{{@App\Models\FooterInformation::first()->about}}</div>
                          <hr>
                          <ul
                              class="styled-icons icon-white icon-md icon-hover-theme-colored1 icon-circled clearfix mt-30">
                              @foreach (@App\Models\SocialLink::where('on_footer', 1)->get() as $item)
                                  <li><a class="social-link" href="{{$item->link}}"><i class="{{$item->icon}}"></i></a></li>
                              @endforeach
                          </ul>
                      </div>
                  </div> --}}
                  <div class="col-md-6 col-xl-4">
                      <div class="widget widget_nav_menu">
                          <h4 class="widget-title">{{ trans('frontend.Links') }}</h4>
                          <div class="menu-service-nav-menu-container">
                              <ul id="menu-service-nav-menu" class="menu">
                                  @foreach (@App\Models\FooterLink::all() as $item)
                                      <li><a class="menu-item" href="{{ $item->link }}">{{ $item->name }}</a>
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
                  {{-- <div class="col-md-6 col-xl-3 p-0 pl-lg-15 pr-lg-15">
                      <div class="widget widget-blog-list clearfix mb--0 mt-lg-40">
                          <h4 class="widget-title">{{trans('frontend.Latest Blogs')}}</h4>
                          <div class="tm-widget tm-widget-blog-list ">
                              <!-- the loop -->
                              @foreach (@App\Models\Blog::where('status', 1)->latest()->limit(2)->get() as $item)
                                  <article class="post media-post mb-25 clearfix">
                                      <a class="post-thumb" href="javascript::void()">
                                          <img src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}" >
                                      </a>
                                      <div class="post-right">
                                          <div class="post-date">
                                              <span
                                                  class="entry-date text-theme-colored1">{{Carbon\Carbon::parse($item->created_a)->format('d M, Y ')}}</span>
                                          </div>
                                          <h6 class="post-title"> <a class="text-white"
                                                  href="{{route('blog_show', ['slug' => $item->slug])}}">{{$item->title}}</a>
                                          </h6>
                                      </div>
                                  </article>
                              @endforeach
                              <!-- end of the loop -->
                          </div>
                      </div>
                  </div> --}}
                  <div class="col-md-6 col-xl-4">
                      <div class="widget widget-contact clearfix mb--0 mt-lg-40">
                          <h4 class="widget-title">{{ trans('frontend.You’ve Any Question?') }}</h4>
                          <div class="tm-widget tm-widget-contact">
                              <ul class="contact-info">
                                  @foreach (@App\Models\FooterContactItem::all() as $item)
                                      <li>
                                          <i
                                              class="{{ $item->icon }} font-icon sm-display-block text-theme-colored1 mr-10"></i>
                                          {{ $item->name }}
                                      </li>
                                      <li class="contact-address">{{ $item->content }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="footer-bottom border-top">
              <div class="container">
                  <div class="row pt-20 pb-20">
                      <div class="col-lg-4">
                          <div class="footer-paragraph mb-md-20">
                              {{ @App\Models\FooterInformation::first()->copyright }}
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="footer-paragraph text-center mb-md-20">
                              <img src="{{ url(GetSetting('footer_logo')) }}" class="h_35">
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="footer-paragraph text-end">
                              <div class="widget-pages-link font-size-14">
                                  {{-- <a class="mr-10" href="{{url('/')}}/{{@App\Models\FooterInformation::first()->term_of_use}}">{{trans('frontend.Terms of Use')}}</a>
                                  <a class="mr-10" href="javascript::void()">-</a>
                                  <a href="{{url('/')}}/{{@App\Models\FooterInformation::first()->privacy_policy}}">{{trans('frontend.Privacy Policy')}}</a> --}}
                                  <a
                                      href="{{ url('/') }}/syarat-dan-ketentuan">{{ trans('frontend.Privacy Policy') }}</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
