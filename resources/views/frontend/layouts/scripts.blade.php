<!-- Footer Scripts -->
<!-- external javascripts -->
<script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
<script src="{{asset('assets/frontend/js/preloader.js')}}"></script>

<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/javascript-plugins-bundle.js')}}"></script>
<script src="{{asset('assets/frontend/js/menuzord/js/menuzord.js')}}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{asset('assets/frontend/js/revolution-slider/js/revolution.tools.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/revolution-slider/js/rs6.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider1.js')}}"></script>

<script src="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider-shop.js')}}"></script>


<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<script src="{{asset('assets/frontend/js/select2.js')}}"></script>

<!-- JS | Custom script for all pages -->
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>

<script src="{{asset('assets/toastr/toastr.min.js')}}"></script>

@include('sweetalert::alert')

<script>
    "use strict";
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    function fetchCart() {
        $.ajax('{{route('cart_fetch')}}', {
            success: function(data) {
                $('.top-nav-mini-cart-icon-contents').html(data);
            }
        });
    }
    function addToCart(product, quantity) {

        $.ajax('{{route('cart_add')}}', {
            data: {
                'product_id': product,
                'quantity': quantity,
            },
            success: function(data) {

                if (data.status == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product added to cart !'
                    });
                    fetchCart();
                }
            }
        });
    }
    function removeFromCart(product) {
        $.ajax('{{route('cart_remove')}}', {
            data: {
                'item': product,
            },
            success: function(data) {

                if (data.status == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product removed from cart !'
                    });
                    fetchCart();
                    fetchCartPage();
                }
            }
        });
    }

    function removeItemFromCart(product) {
        $.ajax('{{route('cart_remove')}}', {
            data: {
                'item': product,
            },
            success: function(data) {

                if (data.status == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product removed from cart !'
                    });
                    location.reload();
                }
            }
        });
    }

    function clearCart(product, quantity) {
        $.ajax('{{route('cart_add')}}', {
            success: function(data) {

                if (data.status == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: 'Cart Cleared !'
                    });
                    fetchCart();
                }
            }
        });
    }
    fetchCart();
</script>
<script>
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
        toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
        toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
        toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
        toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

{!! NoCaptcha::renderJs() !!}
@stack('scripts')

