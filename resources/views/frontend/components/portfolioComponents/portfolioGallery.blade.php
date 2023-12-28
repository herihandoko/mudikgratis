<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="tm-sc-portfolio tm-sc-portfolio-masonry portfolio-style2-simple">
                <!-- Isotope Gallery Grid -->
                <div id="portfolio-holder-618422" class="isotope-layout grid-4 gutter-10 clearfix lightgallery-lightbox">
                    <div class="isotope-layout-inner osptope-custom">
                        @foreach (@App\Models\Portfolio::all() as $item)
                            <!-- Isotope Item Start -->
                            <div class="isotope-item">
                                <div class="isotope-item-inner">
                                    <div class="tm-portfolio">
                                        <div class="tm-portfolio-inner">
                                            <div class="thumb">
                                                <a href="{{ route('portfolio', ['slug' => $item->slug]) }}">
                                                    <img width="672" height="448" src="{{ asset($item->image) }}"
                                                        alt="{{ getAlterTag($item->image) }}">
                                                </a>
                                                <div class="d-none"></div>
                                            </div>
                                            <div class="tm-portfolio-content-wrapper">
                                                <div class="tm-portfolio-content">
                                                    <div class="tm-portfolio-content-inner">
                                                        <div class="title-holder">
                                                            <h5 class="title"><a
                                                                    href="portfolio-details-image.html">{{ $item->title }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-holder">
                                                            <div class="categories">{{ $item->category }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Isotope Item End -->
                        @endforeach
                    </div>
                </div>
                <!-- End Isotope Gallery Grid -->
            </div>
        </div>
    </div>
</div>
