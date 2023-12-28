@php
$page_title = 'Cart';
@endphp
@php
use Illuminate\Support\Str;
$cart = Cart::content();
$total = getTotal();
@endphp
@extends('frontend.layouts.master')
@section('content')
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        @include(getHeader())
        <!-- Start main-content -->
        <div class="main-content-area">

            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive mt-5">
                                <table class="table table-striped table-bordered tbl-shopping-cart">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{trans('frontend.Photo')}}</th>
                                            <th>{{trans('frontend.Product Name')}}</th>
                                            <th>{{trans('frontend.Price')}}</th>
                                            <th>{{trans('frontend.Quantity')}}</th>
                                            <th>{{trans('frontend.Total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach(Cart::content() as $row) :?>
                                        <tr class="cart_item">
                                            <td class="product-remove"><a title="Remove this item" class="remove"
                                                    href="javascript:void(0)"
                                                    onclick="removeItemFromCart('{{$row->rowId}}')">×</a>
                                            </td>
                                            <td class="product-thumbnail"><a
                                                    href="{{route('product', ['slug' => @App\Models\Product::find($row->id)->slug])}}"><img
                                                        alt="{{$row->name}}"
                                                        src="{{asset(MediaImage(@App\Models\Product::find($row->id)->image, 1))}}"></a>
                                            </td>
                                            <td class="product-name"><a
                                                    href="{{route('product', ['slug' => @App\Models\Product::find($row->id)->slug])}}">{{$row->name}}</a>
                                            </td>
                                            <td class="product-price"><span
                                                    class="amount">{{GetSetting('site_currency_icon')}}{{$row->price}}</span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" data-change="quantity"
                                                        data-quantity="decrement" data-id="{{$row->rowId}}" value="-">
                                                    <input type="number" size="4" product-id="{{$row->rowId}}"
                                                        class="input-text qty text" title="Qty" value="{{$row->qty}}"
                                                        name="quantity" min="1" step="1">
                                                    <input type="button" class="plus" data-change="quantity"
                                                        data-quantity="increment" data-id="{{$row->rowId}}" value="+">
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span
                                                    class="amount">{{GetSetting('site_currency_icon')}}{{$row->total}}</span>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>{{trans('frontend.Shipping Information')}}</h4>
                                    <form class="form" action="{{route('user.shipping-address')}}" method="POST">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">{{trans('frontend.Country')}}</label>
                                            <select class="form-control" name="country" id="country" required>
                                                <option value="">-- {{trans('frontend.Country')}} ---</option>
                                                @foreach (Countries() as $item)
                                                    <option @if (@$user->address->country == $item) selected @endif
                                                        value="{{$item}}"> {{$item}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{trans('frontend.City')}}</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{@$user->address->city}}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{trans('frontend.Postal Code')}}</label>
                                            <input type="text" class="form-control" name="post_code"
                                                value="{{@$user->address->post_code}}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">{{trans('frontend.Full Address')}}</label>
                                            <textarea type="text" class="form-control" name="address"
                                                required>{!! @filterTag(clean($user->address->address)) !!}</textarea>
                                        </div>
                                        <button class="cart-checkout-button btn btn-theme-colored1 mb-5 mt-4" type="submit">
                                            <i class="fas fa-save    "></i>{{trans('frontend.Update')}}</button>
                                    </form>
                                </div>


                                <div class="col-md-6">
                                    <h4>{{trans('frontend.Cart Totals')}}</h4>
                                    <table class="table table-bordered" id="total-table">
                                        <tbody>
                                            <tr>
                                                <td>{{trans('frontend.Cart Subtotal')}}</td>
                                                <td>{{GetSetting('site_currency_icon')}}
                                                    {{numberFormat(cartTotal())}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{trans('frontend.Shipping and Handling')}}</td>
                                                <td id="shipping-fee">{{GetSetting('site_currency_icon')}}
                                                    {{numberFormat(shippingFee())}}</td>
                                            </tr>
                                            @if (@App\Models\ShopSetting::first()->tax > 0)
                                                <tr>
                                                    <td>{{trans('frontend.Tax')}}</td>
                                                    <td id="total">{{GetSetting('site_currency_icon')}}
                                                        {{numberFormat(taxOf(cartTotal()))}}
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>{{trans('frontend.Order Total')}}</td>
                                                <td id="total">{{GetSetting('site_currency_icon')}}
                                                    {{numberFormat(getTotal())}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    @if (Auth::user()->address)
                                        <div class="form-group mb-3">
                                            <label>
                                                {{trans('frontend.Payment Method')}}
                                            </label>
                                            <select name="payment_method" class="form-control">
                                                <option value="">{{trans('frontend.Select Payment Method')}}</option>
                                                @if (PaymentGateway('paypal_api_status'))
                                                    <option value="PayPal">{{trans('frontend.Paypal')}}</option>
                                                @endif
                                                @if (PaymentGateway('stripe_api_status'))
                                                    <option value="Stripe">{{trans('frontend.Stripe')}}</option>
                                                @endif
                                                @if (PaymentGateway('razorpay_status'))
                                                    <option value="RazorPay">{{trans('frontend.RazorPay')}}</option>
                                                @endif
                                                @if (PaymentGateway('flutterwave_status'))
                                                    <option value="Flutterwave">{{trans('frontend.FlutterWave')}}</option>
                                                @endif
                                                @if (PaymentGateway('mollie_status'))
                                                    <option value="Mollie">{{trans('frontend.Mollie')}}</option>
                                                @endif
                                                @if (PaymentGateway('instamojo_status'))
                                                    <option value="Instamojo">{{trans('frontend.Instamojo')}}</option>
                                                @endif
                                                @if (PaymentGateway('paystack_status'))
                                                    <option value="Paystack">{{trans('frontend.Paystack')}}</option>
                                                @endif
                                                @if (PaymentGateway('bank_account_status'))
                                                    <option value="Bank">{{trans('frontend.Bank')}}</option>
                                                @endif
                                            </select>
                                        </div>
                                    @endif

                                    @php
                                        $payable_amount = $total * PaymentGateway('paypal_rate');
                                        $payable_amount = round($payable_amount, 2);
                                        @endphp
                                    <div class="PayPal box">
                                        <div class="form-group">
                                                <a href="{{route('user.pay-with-paypal', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $payable_amount])}}" type="submit" class="btn btn-primary mt-4">{{trans('frontend.Pay with paypal')}}</a>
                                        </div>
                                    </div>

                                    <div class="Stripe box">

                                        @php
                                        $payable_amount = $total * PaymentGateway('stripe_rate');
                                        $payable_amount = round($payable_amount, 2);
                                        @endphp



                                        <form role="form"
                                            action="{{route('user.stripe-pay', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $payable_amount])}}"
                                            method="post" class="require-validation" data-cc-on-file="false"
                                            data-stripe-publishable-key="{{PaymentGateway('stripe_api_publishable_key')}}"
                                            id="payment-form">
                                            @csrf
                                            <div class="form-group">
                                                <label>
                                                    {{trans('frontend.Card Number')}}
                                                </label>
                                                <input type="text" class="form-control card-number">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    {{trans('frontend.Card CVC')}}
                                                </label>
                                                <input type="text" class="form-control card-cvc">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    {{trans('frontend.Expire Month')}}
                                                </label>
                                                <input type="text" class="form-control card-expiry-month">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    {{trans('frontend.Expire Year')}}
                                                </label>
                                                <input type="text" class="form-control card-expiry-year">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block mt-4 mb-4"
                                                    type="submit">{{trans('frontend.Pay With Stripe')}}</button>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 col-md-12 error hide">
                                                    <div class="alert-danger alert">{{trans('frontend.Stripe Error')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="RazorPay box">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="col-sm-12 col-md-12">

                                                @php
                                                $payable_amount = $total * PaymentGateway('razorpay_rate');
                                                $payable_amount = round($payable_amount, 2);
                                                @endphp

                                                <form
                                                    action="{{route('user.razorpay-pay', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $payable_amount])}}"
                                                    method="POST">
                                                    @csrf
                                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{PaymentGateway('razorpay_key_id')}}"
                                                                                                        data-amount="{{$payable_amount * 100}}"
                                                                                                        data-currency="{{GetSetting('site_currency')}}"
                                                                                                        data-buttontext="Pay with Razorpay"
                                                                                                        data-buttontext="Pay with Razorpay"
                                                                                                        data-buttonclass="btn btn-success"
                                                                                                        data-name="{{GetSetting('site_name')}}"
                                                                                                        data-image="{{url(GetSetting('site_logo'))}}"
                                                                                                        data-prefill.name="" data-prefill.email=""
                                                                                                        data-theme.color="#0b29a2">
                                                    </script>
                                                    <input type="hidden" custom="Hidden Element" name="hidden">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Flutterwave box">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="col-sm-12 col-md-12">
                                                <button type="button" class="btn btn-primary" onClick="makePayment()">{{trans('frontend.Pay Now')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Mollie box">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="col-sm-12 col-md-12">
                                                @php
                                                $payable_amount = $total * PaymentGateway('mollie_rate');
                                                $payable_amount = round($payable_amount, 2);
                                                @endphp
                                                <form
                                                    action="{{route('user.mollie-pay', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $payable_amount])}}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-primary">{{trans('frontend.Pay with Mollie')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Instamojo box">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="col-sm-12 col-md-12">
                                                @php
                                                $payable_amount = $total * PaymentGateway('instamojo_rate');
                                                $payable_amount = round($payable_amount, 2);
                                                @endphp
                                                <form
                                                    action="{{route('user.instamojo-pay', ['cart' => base64_encode($cart),'tax' => taxOf(cartTotal()),'total' => $payable_amount])}}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">{{trans('frontend.Pay with Instamojo')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Paystack box">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="col-sm-12 col-md-12">
                                                <form id="paymentForm">
                                                    <div class="form-submit">
                                                        <button type="submit" class="btn btn-primary btn-block"
                                                            onclick="payWithPaystack()">{{trans('frontend.Pay with Paystack')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Bank box mb-4">
                                        <form
                                            action="{{route('user.bank-pay', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $total])}}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group py-3">
                                                {{ PaymentGateway('bank_account_details') }}
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    {{trans('frontend.Transaction Information')}}
                                                </label>
                                                <textarea name="bank_transaction_info" class="form-control h_100" cols="30"
                                                    rows="10"></textarea>
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">{{trans('frontend.Submit')}}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-content -->
        @include(getFooter())
        <a class="scrollToTop" href="javascript::void()"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
@endsection



@push('scripts')


    <script>
        $("[data-change='quantity']").on('click', function() {
            $.ajax('{{route('cart_quantity')}}', {
                data: {
                    'product_id': $(this).attr('data-id'),
                    'quantity': $("[product-id='" + $(this).attr('data-id') + "']").val(),
                    'type': $(this).attr('data-quantity'),
                },
                success: function(data) {
                    if (data.status == 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: 'Quantity Updated'
                        });
                        location.reload();
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("select").on('change', function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>




    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>

<script src="https://checkout.flutterwave.com/v3.js"></script>

@php
$payable_amount = $total * PaymentGateway('flutterwave_rate');
$payable_amount = round($payable_amount, 2);
@endphp

    <script>

        function makePayment() {
            FlutterwaveCheckout({
                public_key: "{{PaymentGateway('flutterwave_public_key')}}",
                tx_ref: "RX1",
                amount: {{$payable_amount}},
                currency: "{{PaymentGateway('flutterwave_currency')}}",
                country: "{{PaymentGateway('flutterwave_country')}}",
                payment_options: " ",
                redirect_url: // specified redirect URL
                    "{{route('user.flutterwave-pay', ['cart' => base64_encode($cart),'tax' => taxOf(cartTotal()),'total' => $payable_amount])}}",
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: "{{Auth::user()->email}}",
                    phone_number: "{{Auth::user()->phone}}",
                    name: "{{Auth::user()->name}}",
                },

                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        }
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
@php
$payable_amount = $total * PaymentGateway('paystack_rate');
$payable_amount = $payable_amount * 100;
$payable_amount = round($payable_amount, 2);
@endphp
    <script>
        let paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(event) {
            event.preventDefault();
            let handler = PaystackPop.setup({
                key: "{{PaymentGateway('paystack_public_key')}}",
                email: "{{Auth::user()->email}}",
                amount: "{{$payable_amount}}",
                currency: "{{PaymentGateway('paystack_currency')}}",
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    let reference = response.reference;
                    let tnx_id = response.transaction;
                    window.location.href =
                        "{{route('user.paystack-pay', ['cart' => base64_encode($cart), 'tax' => taxOf(cartTotal()), 'total' => $payable_amount])}}&trx_id=" +
                        tnx_id + "&reference=" + reference;
                }
            });

            handler.openIframe();
        }
    </script>
@endpush
