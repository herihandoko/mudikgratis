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
<div class="product-single p-4">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <img src="{{asset(MediaImage($product->image, 1))}}" alt="{{getAlterTag($product->image)}}">
        </div>
        <div class="col-lg-12">
            <div class="product-summary">
                <h2 class="product-title mt-0">{{$product->name}}</h2>
                <div class="product-rating">
                    @php
                        $sum = $product->reviews->sum('rating');
                        $count = $product->reviews->count();
                        if ($count == 0) {
                            $cnt = 100;
                        } else {
                            $cnt = $count;
                        }
                        $rating = $sum / $cnt;
                        $percent = ($sum / $cnt) * 20;
                    @endphp
                    <div class="star-rating" role="img" aria-label="Rated {{$rating}} out of 5"><span
                            style="width:{{$percent}}%">{{trans('frontend.Rated')}}<strong
                                class="rating">{{$rating}}</strong>
                             {{trans('frontend.out of 5 based on')}} <span class="rating">{{$count}}</span>  {{trans('frontend.customer rating')}}</span></div>
                    <a class="review-link" rel="nofollow">(<span class="count">{{$count}}</span>
                        {{trans('frontend.customer review')}})</a>
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
                    <span class="sku_wrapper">{{trans('frontend.SKU')}}: <span class="sku"
                            data-o_content="{{$product->sku}}">{{$product->sku}}</span></span>
                    <span class="posted_in">{{trans('frontend.Category')}}: <a href=""
                            rel="tag">{{$product->getCategory->name}}</a></span>
                </div>
                <div class="btn-add-to-cart">
                    <div class="quantity">
                        <input class="minus" type="button" value="-">
                        <input type="number" id="prouct_quantity" class="input-text qty text" step="1" min="1"
                            max="" name="quantity" value="1" title="Qty" size="4"  inputmode="numeric">
                        <input class="plus" type="button" value="+">
                    </div>
                    <a href="javascript:void(0)" onclick="addItemsToCart()" class="btn btn-theme-colored1 ml-10">{{trans('frontend.Add to cart')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addItemsToCart() {
        let quantity = $('#prouct_quantity').val();
        addToCart({{$product->id}}, quantity);
        $("#product-quickview").modal('hide');
    }
</script>
