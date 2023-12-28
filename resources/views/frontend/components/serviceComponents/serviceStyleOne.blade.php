    <!-- Section: Our Services -->
    <section >
        <div class="container pb-90">
            <div class="section-content">
                <div class="row">
                    @foreach (@App\Models\Service::all() as $item)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="tm-sc-service service-item-current-style2">
                                <div class="service-thumb">
                                    <img class="img-fullwidth" src="{{asset($item->image)}}" alt="{{getAlterTag($item->image)}}">
                                </div>
                                <div class="service-content">
                                    <div class="service-icon">
                                        <div class="icon">
                                            <i class="{{$item->icon}}"></i>
                                        </div>
                                    </div>
                                    <h4 class="title service-title">{{$item->title}}</h4>
                                    <p>{!!Str::words(removeTag($item->description), 9, ' ')!!}</p>
                                    <a class="btn btn-theme-colored1 btn-view-details"
                                        href="{{route('service_show', ['slug' => $item->slug])}}">{{trans('frontend.Read More')}} ➞</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
