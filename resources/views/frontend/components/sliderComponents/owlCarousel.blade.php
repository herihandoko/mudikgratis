<section >
    <div class="tm-owl-carousel-1col" data-nav="true" data-dots="true">
        @foreach (@App\Models\Slider::all() as $item)
        <div class="bg-img-cover" data-tm-bg-img="{{MediaImage($item->image, 1)}}">
            <div class="container pt-200 pb-200">
              <div class="row justify-content-center">
                <div class="col-md-7">
                  <div class="bg-white-transparent-8 text-center p-30 pt-20 pb-50 outline-border-5px">
                    <h1 data-tm-font-size="3.3rem">{{$item->title}}</h1>
                    <p >{{$item->subtitle}}</p>
                    <a class="btn btn-theme-colored1 btn-round mt-15" href="{{$item->button_link}}">{{$item->button}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</section>
