<!-- Section: Divider -->
<section>
    <div class="container p-0">
        <div class="section-content bg-theme-colored1 mailchimp_subscription mb-sm--0" data-tm-margin-bottom="-100px">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-4">
                    <div class="subscribe-block mb-md-30">
                        <div class="icon"><img src="{{asset('assets/frontend/images/icon/14.png')}}">
                        </div>
                        <h3 class="subscribe-text">{{trans('frontend.Subscribe our newsletter')}}</h3>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8">

                    <form id="news-letter" class="newsletter-form" novalidate="true">
                        <label for="mce-EMAIL"></label>
                        <div class="input-group">
                            <input type="email" id="mce-EMAIL" data-tm-height="80px" class="form-control h_80"
                                placeholder="Enter Email Address" name="email" value="" >
                            <div class="input-group-append tm-sc-button">
                                <button type="submit" class="newsletter-btn btn btn-theme-colored2 text-white h_80"
                                    data-tm-height="80px">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true" data-nl-spin="true"></span>
                                    {{trans('frontend.Subscribe')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Google Map -->
<section class="z-index--1">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <iframe class="w-100" src="{{@App\Models\GoogleMap::first()->link}}" height="595"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@php
    $demo_check = env("DEMO_MODE");
@endphp


@push('scripts')
    <script>

        var demo_mode = JSON.parse("{{json_encode($demo_check)}}");

        $("#news-letter").submit(function(e) {

            e.stopImmediatePropagation();
            e.preventDefault();

            if (demo_mode == true) {
                toastr.error('{{trans('frontend.This action is blocked in demo mode!')}}');
                return false;
            }

            $('[data-nl-spin=true]').removeClass('d-none');
            $.ajax('{{route('news_letter')}}', {
                data: $(`#news-letter`).serialize(),
                success: function(data) {

                    $('#mce-EMAIL').val('');

                    $('[data-nl-spin=true]').removeClass('d-none');

                    if (data.status == 'exist') {
                        $('[data-nl-spin=true]').addClass('d-none');
                        Toast.fire({
                            icon: 'error',
                            title: '{{trans('frontend.Email Already Subscribed!')}}'
                        });
                    }
                    if (data.status == 'invalid') {
                        $('[data-nl-spin=true]').addClass('d-none');
                        Toast.fire({
                            icon: 'error',
                            title: '{{trans('frontend.Invalid Email!')}}'
                        });
                    }
                    if (data.status == 'success') {
                        $('[data-nl-spin=true]').addClass('d-none');
                        Toast.fire({
                            icon: 'success',
                            title: '{{trans('frontend.Please check email to confirm!')}}'
                        });
                    }
                }
            });
        });
    </script>
@endpush
