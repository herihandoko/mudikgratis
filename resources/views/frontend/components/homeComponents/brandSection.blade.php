@if (@App\Models\Sponsor::count())
    <!-- Section: Partners -->
    <section class="border-top">
        <div class="container pb-140 pb-lg-120">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin owl-dots-center clients-animation-grayscale">
                        <div class="owl-carousel owl-theme tm-owl-carousel-5col" data-autoplay="true" data-loop="true"
                            data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0"
                            data-laptop="4">
                            @foreach (@App\Models\Sponsor::all() as $item)
                                <div class="item">
                                        <img src='{{asset($item->image)}}' alt="{{getAlterTag($item->image)}}" /></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
