<!-- Header -->
  <header id="header" class="header header-layout-type-header-2rows-floating-header-style5 header-nav-left header-bg-dark-shadow">
    <div class="header-middle">
      <div class="container">
        <div class="row">


          <div class="col-xl-auto align-self-center header-mid-left text-center text-xl-start">
            <a class="menuzord-brand site-brand" href="{{url('/')}}">
              <img class="logo-default logo-1x" src="{{url(GetSetting('site_logo'))}}" alt="Logo">
              <img class="logo-default logo-2x retina" src="{{url(GetSetting('site_logo'))}}" alt="Logo">
            </a>
          </div>
          <div class="col-xl-auto align-self-center ms-xl-auto header-mid-right text-center text-xl-end">
            <div class="header-mid-column3-container">
              <div class="row justify-content-md-center">
                <div class="col-md-auto element text-center text-md-start">
                  <div class="contact-info-box big-icon">
                    <div class="left-thumb"> <a href="tel:{{@App\Models\HeaderContact::first()->phone}}"> <i class="flaticon-contact-044-call-1 font-icon  sm-display-block"></i> </a></div>
                    <div class="media-body">
                      <h5 class="title">{{trans('Call us at')}}</h5>
                      <div class="subtitle"><a href="tel:{{@App\Models\HeaderContact::first()->phone}}">{{@App\Models\HeaderContact::first()->phone}}</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-auto element text-center text-md-start">
                  <div class="contact-info-box big-icon">
                    <div class="left-thumb"> <a href="mailto:{{@App\Models\HeaderContact::first()->email}}"> <i class="flaticon-contact-043-email-1 font-icon  sm-display-block"></i> </a></div>
                    <div class="media-body">
                      <h5 class="title">{{trans('Email us')}}</h5>
                      <div class="subtitle"><a href="mailto:{{@App\Models\HeaderContact::first()->email}}">{{@App\Models\HeaderContact::first()->email}}</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-auto element text-center text-md-start">
                  <div class="contact-info-box big-icon">
                    <div class="left-thumb"> <a href="javascript::void()"> <i class="flaticon-contact-025-world font-icon  sm-display-block"></i> </a></div>
                    <div class="media-body">
                      <h5 class="title">{{trans('Address')}}</h5>
                      <div class="subtitle">{{@App\Models\HeaderContact::first()->address}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav tm-enable-navbar-hide-on-scroll">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="menuzord-container header-nav-container">
          <div class="container position-relative">
            <div class="row header-nav-col-row">
              <div class="col-sm-auto align-self-center">
                <nav id="top-primary-nav" class="menuzord theme-color2" data-effect="slide" data-animation="none" data-align="right">
                    <ul id="main-nav" class="menuzord-menu">
                        @foreach (@App\Models\Menu::whereNull('parent_id')->orderBy('order', 'asc')->get() as $item)
                            <li class="menu-item"><a
                                    href="{{asset('/' . $item->link)}}">{{$item->title}}</a>
                                @if (@App\Models\Menu::where('parent_id', $item->id)->orderBy('order', 'asc')->count() > 0)
                                    <ul class="dropdown">
                                        @foreach (@App\Models\Menu::where('parent_id', $item->id)->orderBy('order', 'asc')->get() as $subitem)
                                            <li><a
                                                    href="{{url($subitem->link)}}">{{$subitem->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        @auth
                        <li class="menu-item">
                            <a href="{{route('user.dashboard')}}">{{trans('frontend.Dashboard')}}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('user.logout')}}"
                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                {{trans('frontend.Logout')}}
                            </a>
                            <form id="frm-logout" action="{{route('user.logout')}}" method="POST"
                                class="d-none">
                                {{csrf_field()}}
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="menu-item">
                            <a href="{{route('user.login')}}">{{trans('frontend.Login')}}</a>
                        </li>
                    @endguest
                    </ul>
                </nav>
              </div>
              <div class="col-sm-auto ms-auto align-self-center">
                <ul class="list-inline nav-side-icon-list">
                  <li class="hidden-mobile-mode"><a href="javascript::void()" id="top-nav-search-btn"><i class="search-icon fa fa-search"></i></a></li>
                   @if(@App\Models\ShopSetting::first()->status)
                    <li class="hidden-mobile-mode">
                        <div class="top-nav-mini-cart-icon-container">
                            <div class="top-nav-mini-cart-icon-contents">
                                <a class="mini-cart-icon" href="{{route('user.cart')}}"
                                    title="View your shopping cart">
                                    <img src="{{asset('assets/frontend/images/shopping-cart.png')}}"
                                        width="25" alt="cart"><span
                                        class="items-count">{{Cart::count()}}</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endif
                  <li class="hidden-mobile-mode">
                    <div id="side-panel-trigger" class="side-panel-trigger">
                      <a href="javascript::void()">
                        <div class="hamburger-box">
                          <div class="hamburger-inner"></div>
                        </div>
                        </a>
                    </div>
                  </li>
                  <li class="hidden-mobile-mode">
                    <div id="side-panel-trigger" class="side-panel-trigger">
                      <a href="javascript::void()">
                        <div class="hamburger-box">
                          <div class="hamburger-inner"></div>
                        </div>
                        </a>
                    </div>
                  </li>
                </ul>

                <div id="top-nav-search-form" class="clearfix">
                  <form action="{{route('blog_search')}}" method="GET">
                    <input type="text" name="query" value="" placeholder="{{trans('frontend.Type and press enter to search blog...')}}" autocomplete="off" />
                  </form>
                  <a href="javascript::void()" id="close-search-btn"><i class="fa fa-times"></i></a>
                </div>
              </div>
            </div>
            <div class="row d-block d-xl-none">
               <div class="col-12">
                <nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
                 <ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable">
                 </ul>
                </nav>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
