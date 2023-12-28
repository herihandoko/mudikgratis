@php
use Illuminate\Support\Str;
@endphp
@php
$page_title =  $product->name;
$content_image = asset($product->image);
$content_url = url()->current();
$description =  Str::words(removeTag($product->description) , '25');
@endphp
@php
$customer_bought = 0;
if (auth()->check()) {
    $orders = Auth::user()->orders;
    foreach ($orders as $order) {
        $item = @App\Models\OrderItem::where(['order_id' => $order->id, 'item_id' => $product->id])->sum('item_qty');
        $customer_bought += $item;
    }
}
@endphp
@extends('frontend.layouts.master')
@section('content')
<div id="wrapper" class="clearfix">
    <!-- Header -->
    @include(getHeader())
    <!-- Start main-content -->
    <div class="main-content-area">
        <section>
            <div class="container">
                <div class="section-content">
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-image-slider lightgallery-lightbox mb-md-30">
                                    <div class="tm-owl-thumb-carousel" data-nav="true" data-slider-id="1">
                                        @foreach (MediaImages($product->image) as $image)
                                            <div data-thumb="{{asset($image)}}">
                                                <a class="lightgallery-trigger" data-exthumbimage="{{asset($image)}}"
                                                    data-src="{{asset($image)}}" title="{{$product->name}}"
                                                    href="{{asset($image)}}"><img class="img-fullwidth"
                                                        src="{{asset($image)}}" alt="{{getAlterTag($image)}}"></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <ul class="tm-owl-thumbs" data-slider-id="1">
                                        @foreach (MediaImages($product->image) as $image)
                                            <li class="tm-owl-thumb-item">
                                                <img src="{{asset($image)}}" alt="{{$product->name}}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-summary">
                                    <h2 class="product-title mt-0">{{$product->name}}</h2>
                                    <div class="product-rating">
                                        @php
                                            $sum = $product->reviews()->where(['status' => 1])->sum('rating');
                                            $count = $product->reviews()->where(['status' => 1])->count();
                                            if ($count == 0) {
                                                $cnt = 100;
                                            } else {
                                                $cnt = $count;
                                            }
                                            $rating = $sum / $cnt;
                                            $percent = ($sum / $cnt) * 20;
                                        @endphp
                                        <div class="star-rating" role="img"
                                            aria-label="Rated {{$rating}} out of 5"><span
                                                style="width:{{$percent}}%">{{trans('frontend.Rated')}}<strong
                                                    class="rating">{{$rating}}</strong>{{trans('frontend.out of 5 based on')}}<span
                                                    class="rating">{{$count}}</span>{{trans('frontend.customer rating')}}</span>
                                        </div>
                                        <a class="review-link" rel="nofollow">(<span
                                                class="count">{{$count}}</span>{{trans('frontend.customer review')}})</a>
                                    </div>



                                    <p class="price">

                                        @if ($product->discount_price)
                                        <del class="me-2">
                                            <span class="amount del">

                                                    <span class="currency-symbol">
                                                        {{GetSetting('site_currency_icon')}}
                                                    </span>{{$product->price}}

                                            </span>
                                        </del>

                                        <span class="amount"><span
                                                    class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$product->discount_price}}</span>
                                    @else
                                        <span class="amount"><span
                                                    class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$product->price}}</span>
                                    @endif



                                    </p>







                                    <div class="short-description">
                                        {!! clean($product->short_description) !!}
                                    </div>
                                    <div class="product_meta">
                                        <span class="sku_wrapper">{{trans('frontend.SKU')}}: <span
                                                class="sku"
                                                data-o_content="{{$product->sku}}">{{$product->sku}}</span></span>
                                        <span class="posted_in">{{trans('frontend.Category')}}: <a href=""
                                                rel="tag">{{$product->getCategory->name}}</a></span>
                                    </div>
                                    <div class="btn-add-to-cart">
                                        <div class="quantity">
                                            <input class="minus" type="button" value="-">
                                            <input type="number" id="prouct_quantity" class="input-text qty text"
                                                step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4"
                                                inputmode="numeric">
                                            <input class="plus" type="button" value="+">
                                        </div>
                                        <a href="javascript:void(0)" onclick="addItemsToCart()"
                                            class="btn btn-theme-colored1 ml-10">{{trans('frontend.Add to cart')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-60">
                                <div class="horizontal-tab product-tab">
                                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <li class="nav-item">
                                            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab"
                                                data-bs-target="#desc-content" role="tab" aria-controls="desc-content"
                                                aria-selected="true"><strong>{{trans('frontend.Description')}}</strong></button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="addinfo-tab" data-bs-toggle="tab"
                                                data-bs-target="#addinfo-content" role="tab"
                                                aria-controls="addinfo-content"
                                                aria-selected="true"><strong>{{trans('frontend.Additional Information')}}</strong></button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                                data-bs-target="#reviews-content" role="tab"
                                                aria-controls="reviews-content"
                                                aria-selected="true"><strong>{{trans('frontend.Reviews')}}</strong></button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active p-20" id="desc-content" role="tabpanel"
                                            aria-labelledby="desc-tab">
                                            {!! clean($product->description) !!}
                                        </div>
                                        <div class="tab-pane fade p-20" id="addinfo-content" role="tabpanel"
                                            aria-labelledby="addinfo-tab">
                                            <table class="table table-striped">
                                                <tbody>
                                                    @if ($product->brand)
                                                        <tr>
                                                            <th>{{trans('frontend.Brand')}}</th>
                                                            <td>
                                                                <p>{{$product->brand}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->color)
                                                        <tr>
                                                            <th>{{trans('frontend.Color')}}</th>
                                                            <td>
                                                                <p>{{$product->color}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->weight)
                                                        <tr>
                                                            <th>{{trans('frontend.Weight')}}</th>
                                                            <td>
                                                                <p>{{$product->weight}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->dimensions)
                                                        <tr>
                                                            <th>{{trans('frontend.Dimension')}}</th>
                                                            <td>
                                                                <p>{{$product->dimensions}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->stock)
                                                        <tr>
                                                            <th>{{trans('frontend.Stock')}}</th>
                                                            <td>
                                                                <p>{{$product->stock}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @if ($product->sku)
                                                        <tr>
                                                            <th>{{trans('frontend.SKU')}}</th>
                                                            <td>
                                                                <p>{{$product->sku}}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade p-20" id="reviews-content" role="tabpanel"
                                            aria-labelledby="reviews-tab">
                                            <div class="d-flex justify-content-end">
                                                @if ($customer_bought > 0)
                                                    <button type="button" class="btn btn-primary btn-sm mb-5"
                                                        data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                        <i class="fas fa-thumbs-up    "></i> Add a review!
                                                    </button>
                                                @endif
                                            </div>
                                            <ol class="product-reviews">
                                                @foreach (@App\Models\ProductReview::where(['product_id' => $product->id, 'status' => 1])->get() as $item)
                                                    @php
                                                        $percent = $item->rating * 20;
                                                    @endphp
                                                    <li class="review">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0"><img
                                                                    class="thumb img-circle mr-3"
                                                                    src="{{asset('assets/frontend/images/user.png')}}"
                                                                    width="75">
                                                            </div>
                                                            <div class="flex-grow-1 ps-3">
                                                                <ul class="review-meta list-inline">
                                                                    <li>
                                                                        <div class="star-rating" role="img"
                                                                            aria-label="Rated 5 out of 5"><span
                                                                                style="width:{{$percent}}%">{{trans('frontend.Rated')}}<strong
                                                                                    class="rating">{{$item->rating}}</strong>
                                                                                {{trans('frontend.out of 5')}}
                                                                                </span></div>
                                                                    </li>
                                                                    <li>
                                                                        <h5 class="review-heading"><span
                                                                                class="author">{{$item->customer->name}}</span>
                                                                            <small>–
                                                                                {{Carbon\Carbon::parse($item->created_at)->format('d F Y')}}</small>
                                                                        </h5>
                                                                    </li>
                                                                </ul>
                                                                {{$item->comment}}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-60">
                            <h4 class="mb-30">{{trans('frontend.Related Products')}}</h4>
                            <div class="tm-sc-gallery tm-sc-gallery-grid">
                                <!-- Isotope Gallery Grid -->
                                <div id="gallery-holder-618422"
                                    class="isotope-layout grid-4 gutter-15 clearfix lightgallery-lightbox">
                                    <div class="isotope-layout-inner">
                                        @foreach (@App\Models\ProductCategory::find($product->category_id)->products()->latest()->limit(10)->get() as $item)
                                            <div class="isotope-item cat{{$item->category_id}}">
                                                <div class="isotope-item-inner">
                                                    <div class="product">
                                                        <div class="product-header">
                                                            <div class="thumb image-swap">
                                                                <a
                                                                    href="{{route('product', ['slug' => $item->slug])}}"><img
                                                                        src="{{asset(MediaImage($item->image, 1))}}"
                                                                        class="product-main-image img-responsive img-fullwidth"
                                                                        width="300" height="300" alt="product"></a>
                                                                <a
                                                                    href="{{route('product', ['slug' => $item->slug])}}"><img
                                                                        src="{{asset(MediaImage($item->image, 1))}}"
                                                                        class="product-hover-image img-responsive img-fullwidth"
                                                                        alt="product"></a>
                                                            </div>
                                                            <div class="product-button-holder">
                                                                <ul class="shop-icons">
                                                                    <li class="item"><a
                                                                            href="javascript:void(0)"
                                                                            class="button btn-quickview"
                                                                            data-product="{{$item->slug}}"
                                                                            title="Product quick view"></a></li>
                                                                    <li class="item"><a
                                                                            href="javascript:void(0)"
                                                                            onclick="addToCart({{$item->id}})"
                                                                            class="button tm-btn-add-to-cart">{{trans('frontend.Add to cart')}}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <span class="product-categories"><a href="javascript::void()"
                                                                    rel="tag">{{$item->getCategory->name}}</a></span>
                                                            <h5 class="product-title"><a
                                                                    href="{{route('product', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                                            </h5>
                                                            <span class="price">
                                                                @if ($item->discount_price)
                                                                    <del><span class="amount"><span
                                                                                class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->price}}</span></del>
                                                                    <ins><span class="amount"><span
                                                                                class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->discount_price}}</span></ins>
                                                                @else
                                                                    <ins><span class="amount"><span
                                                                                class="currency-symbol">{{GetSetting('site_currency_icon')}}</span>{{$item->price}}</span></ins>
                                                                @endif
                                                            </span>
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
            </div>
        </section>
    </div>
    <!-- end main-content -->
    @include(getFooter())
    <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
</div>
@auth
@if ($customer_bought > 0)
    <!-- Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-right cross" data-bs-dismiss="modal" aria-label="Close"> <i
                            class="fa fa-times mr-2"></i> </div>
                    <div class="card-body text-center"> <img src="{{asset('/assets/frontend/images/flat-color-icons-svg/rating.svg')}}" height="100"
                            width="100">
                        <div class="comment-box text-center">
                            <h4>{{trans('frontend.Add a review')}}</h4>
                            <form action="{{route('user.review', ['id' => $product->id])}}" method="POST">
                                @csrf
                                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label
                                        for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label
                                        for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label
                                        for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label
                                        for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label
                                        for="1">☆</label> </div>
                                <div class="comment-area"> <textarea class="form-control" name="comment"
                                        placeholder="what is your view?" rows="4"></textarea> </div>
                                <div class="text-center mt-4"> <button class="btn btn-success btn-sm send px-5">{{trans('frontend.Submit')}}<i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endauth
 <!-- Modal -->
 <div class="modal fade" id="product-quickview" tabindex="-1" aria-labelledby="product-quickviewLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-lg">
     <div class="modal-content" id="quick-view-modal">
     </div>
 </div>
</div>
@endsection
@push('scripts')
    <script>
        function addItemsToCart() {
            let quantity = $('#prouct_quantity').val();
            addToCart({{$product->id}}, quantity);
        }
    </script>
@endpush
@push('scripts')
 <script>
     $('.btn-quickview').on('click', function() {
         let product = $(this).attr('data-product')
         $.ajax('{{route('product_quickview')}}', {
             data: {
                 'product': product,
             },
             success: function(data) {
                 if (data) {
                     $("#product-quickview").modal('show');
                     $("#quick-view-modal").html(data);
                 }
             }
         });
     });
 </script>
@endpush
