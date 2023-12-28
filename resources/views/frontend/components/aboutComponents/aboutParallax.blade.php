    @if (@App\Models\Parallax::count())
       <!-- Section: Divider -->
       <section class="parallax bg-img-cover bg-img-center" data-parallax-ratio="0.7" data-tm-bg-img="{{asset(@App\Models\Parallax::first()->image)}}">
        <div class="container pb-100">
          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <div class="tm-sc-icon-box icon-box text-center iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate-y mb-50">
                <div class="icon-box-wrapper">
                  <div class="icon-wrapper">
                    <a class="icon icon-xl icon-dark icon-rounded">
                      <i class="{{@App\Models\Parallax::first()->icon}}"></i>
                    </a>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <h1 class="text-white">{{@App\Models\Parallax::first()->title}}</h1>
            </div>
          </div>
        </div>
      </section>
    @endif
