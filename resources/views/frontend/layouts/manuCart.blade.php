<a class="mini-cart-icon" href="{{route('user.cart')}}" title="View your shopping cart">
    <img src="{{asset('assets/frontend/images/shopping-cart.png')}}" width="25" alt="cart"><span
        class="items-count">{{Cart::count()}}</span>
</a>
@if (Cart::content()->count())
<div class="dropdown-content">
    <ul class="cart_list product_list_widget">
        <?php foreach(Cart::content() as $item) :?>
        <li class="mini_cart_item">
            <a href="javascript:void(0)" onclick="removeFromCart('{{$item->rowId}}')" class="remove remove_from_cart_button"
                aria-label="Remove this item" data-product_id="18832" data-cart_item_key="#"
                data-product_sku="{{@App\Models\Product::find($item->id)->sku}}">&times;</a>
            <a href="{{route('product', ['slug' => @App\Models\Product::find($item->id)->slug])}}"> <img class="attachment-thumbnail"
                    src="{{asset(MediaImage(@App\Models\Product::find($item->id)->image, 1))}}" alt="{{getAlterTag(@App\Models\Product::find($item->id)->image)}}" width="300" height="300"
                     />{{$item->name}}</a>
            <span class="quantity">{{$item->qty}} &times; <span class="amount">
                    <span
                        class="currencySymbol">{{GetSetting('site_currency_icon')}}</span>{{$item->price}}</span></span>
        </li>
        <?php endforeach;?>
    </ul>
    <p class="total"> <strong>{{trans('frontend.Subtotal')}} :</strong> <span class="woocommerce-Price-amount amount"><span
                class="currencySymbol">{{GetSetting('site_currency_icon')}}</span>
                {{Cart::priceTotal()}}</span> </p>
    <div class="buttons cart-action-buttons">
        <div class="row">
            <div class="col-12"><a href="{{route('user.cart')}}"
                    class="btn btn-theme-colored2 btn-xs w-100"> <i class="fas fa-shopping-bag    "></i> {{trans('frontend.Checkout')}} </a></div>

        </div>
    </div>
</div>
@endif
