
@foreach ($order->items as $item)
    <div class="order-item d-flex">
        <img class="order-item-image" src="{{asset(MediaImage($item->item->image, 1))}}" >
        <div class="order-item-name">
            <b>{{@$item->item->name}}</b>
            <br>
            <small>
                {{@$item->item_qty}} x {{GetSetting('site_currency_icon')}} {{@$item->item_price}}
            </small>
        </div>
    </div>
@endforeach
