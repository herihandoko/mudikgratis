@php
$page_title = trans('admin.Admin | Settings');
@endphp
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-colorpicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mediamanager.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tagsinput.css') }}">
@endpush
@extends('admin.layouts.master')
@section('content')
    {{-- Main Content --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ trans('admin.Settings') }}</h1>
            </div>

            <a class="btn btn-primary mb-4" href="{{ route('admin.dashboard') }}" role="button"><i
                    class="fas fa-arrow-circle-left    "></i> {{ trans('admin.Back') }}</a>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav flex-column nav-pills mt-2" id="myTab" role="tablist">
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border active" id="general-settings-tab" data-toggle="tab"
                                            href="#general-settings" role="tab" aria-controls="general-settings"
                                            aria-selected="true">{{ trans('admin.General Settings') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="cookie-consent-tab" data-toggle="tab"
                                            href="#cookie-consent" role="tab" aria-controls="cookie-consent"
                                            aria-selected="false">{{ trans('admin.Cookie Consent') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="payment-gateway-tab" data-toggle="tab"
                                            href="#payment-gateway" role="tab" aria-controls="payment-gateway"
                                            aria-selected="false">{{ trans('admin.Payment Gateway') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="re-captcha-tab" data-toggle="tab" href="#re-captcha"
                                            role="tab" aria-controls="re-captcha"
                                            aria-selected="false">{{ trans('admin.Google reCaptcha') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="google-analytic-tab" data-toggle="tab"
                                            href="#google-analytic" role="tab" aria-controls="google-analytic"
                                            aria-selected="false">{{ trans('admin.Google Analytics') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="google-map-tab" data-toggle="tab" href="#google-map"
                                            role="tab" aria-controls="google-map"
                                            aria-selected="false">{{ trans('admin.Google Map') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="email-settings-tab" data-toggle="tab"
                                            href="#email-settings" role="tab" aria-controls="email-settings"
                                            aria-selected="false">{{ trans('admin.Email Settings') }}</a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="email-template-tab" data-toggle="tab"
                                            href="#email-template" role="tab" aria-controls="email-template"
                                            aria-selected="false">{{ trans('admin.Email Template') }}</a>
                                    </li>

                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="pagination-settings-tab" data-toggle="tab"
                                            href="#pagination-settings" role="tab" aria-controls="pagination-settings"
                                            aria-selected="true">{{ trans('admin.Pagination Settings') }}</a>
                                    </li>

                                    <li class="nav-item mb-2">
                                        <a class="nav-link border" id="factory-settings-tab" data-toggle="tab"
                                            href="#factory-settings" role="tab" aria-controls="factory-settings"
                                            aria-selected="false">{{ trans('admin.Factory Settings') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="general-settings" role="tabpanel"
                                        aria-labelledby="general-settings-tab">
                                        <form action="{{ route('admin.generalsettings') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Site Name') }}</label>
                                                                <input type="text" class="form-control" name="site_name"
                                                                    value="{{ GetSetting('site_name') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="d-block">{{ trans('admin.Primary Color') }}</label>
                                                                <div class="input-group" title="Using input value">
                                                                    <input type="text" class="form-control cp-1"
                                                                        value="{{ GetSetting('site_primary_color') }}"
                                                                        name="site_primary_color" required />
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text colorpicker-input-addon"><i
                                                                                class="cp-prev-1"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="d-block">{{ trans('admin.Secondary Color') }}</label>
                                                                <div class="input-group" title="Using input value">
                                                                    <input type="text" class="form-control cp-2"
                                                                        value="{{ GetSetting('site_secondary_color') }}"
                                                                        name="site_secondary_color" required />
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text colorpicker-input-addon"><i
                                                                                class="cp-prev-2"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Site Description') }}</label>
                                                                <textarea type="text" class="form-control h-50" rows="3" name="site_description" required>{!! filterTag(clean(GetSetting('site_description'))) !!}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Site Tags') }}</label>
                                                                <input type="text" class="form-control"
                                                                    data-role="tagsinput" name="site_tags"
                                                                    value="{{ GetSetting('site_tags') }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Site Header') }}</label>
                                                                <select class="form-control" name="site_header" required>
                                                                    @foreach (App\Models\PageHeader::all() as $header)
                                                                        <option
                                                                            @if (GetSetting('site_header') == $header->id) selected @endif
                                                                            value="{{ $header->id }}">
                                                                            {{ $header->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Site Footer') }}</label>
                                                                <select class="form-control" name="site_footer" required>
                                                                    @foreach (App\Models\PageFooter::all() as $footer)
                                                                        <option
                                                                            @if (GetSetting('site_footer') == $footer->id) selected @endif
                                                                            value="{{ $footer->id }}">
                                                                            {{ $footer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="site_currency"
                                                                    required>
                                                                    @foreach (currencies() as $key => $currency)
                                                                        <option
                                                                            @if (GetSetting('site_currency') == $key) selected @endif
                                                                            value="{{ $key }}">
                                                                            {{ $key }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Currency Icon') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="site_currency_icon"
                                                                    value="{{ GetSetting('site_currency_icon') }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Site Direction') }}</label>
                                                                <select class="form-control" name="site_direction"
                                                                    required>
                                                                    <option
                                                                        @if (GetSetting('site_direction') == 'RTL') selected @endif
                                                                        value="RTL">{{ trans('admin.RTL') }}
                                                                    </option>
                                                                    <option
                                                                        @if (GetSetting('site_direction') == 'LTR') selected @endif
                                                                        value="LTR">{{ trans('admin.LTR') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Time Zone') }}</label>
                                                                <select class="form-control" name="site_time_zone"
                                                                    required>
                                                                    @foreach (DateTimeZone::listIdentifiers() as $zone)
                                                                        <option
                                                                            @if (GetSetting('site_time_zone') == $zone) selected @endif
                                                                            value="{{ $zone }}">
                                                                            {{ $zone }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Preloader Enabled') }}</label>
                                                                <select class="form-control" name="preloader_enabled">
                                                                    <option
                                                                        @if (GetSetting('preloader_enabled') == 1) selected @endif
                                                                        value="1">{{ trans('admin.True') }}
                                                                    </option>
                                                                    <option
                                                                        @if (GetSetting('preloader_enabled') == 0) selected @endif
                                                                        value="0">{{ trans('admin.False') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Preloader Style') }}</label>
                                                                <select class="form-control" name="preloader_style">
                                                                    <option
                                                                        @if (GetSetting('preloader_style') == 1) selected @endif
                                                                        value="1">{{ trans('admin.Preloader Style One') }}
                                                                    </option>
                                                                    <option
                                                                        @if (GetSetting('preloader_style') == 2) selected @endif
                                                                        value="2">{{ trans('admin.Preloader Style Two') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @include('admin.layouts.mediaInput', [
                                                                'inputTitle' => 'Site Logo',
                                                                'inputName' => 'site_logo',
                                                                'inputData' => GetSetting('site_logo'),
                                                                'multiInput' => false,
                                                                'buttonText' => 'Select',
                                                            ])
                                                            @include('admin.layouts.mediaInput', [
                                                                'inputTitle' => 'Site Favicon',
                                                                'inputName' => 'site_favicon',
                                                                'inputData' => GetSetting('site_favicon'),
                                                                'multiInput' => false,
                                                                'buttonText' => 'Select',
                                                            ])
                                                            @include('admin.layouts.mediaInput', [
                                                                'inputTitle' => 'Section Icon',
                                                                'inputName' => 'section_icon',
                                                                'inputData' => GetSetting('section_icon'),
                                                                'multiInput' => false,
                                                                'buttonText' => 'Select',
                                                            ])
                                                            @include('admin.layouts.mediaInput', [
                                                                'inputTitle' => 'Footer Logo',
                                                                'inputName' => 'footer_logo',
                                                                'inputData' => GetSetting('footer_logo'),
                                                                'multiInput' => false,
                                                                'buttonText' => 'Select',
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="cookie-consent" role="tabpanel"
                                        aria-labelledby="cookie-consent-tab">
                                        <form action="{{ route('admin.cookiesettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Cookie Consent') }}</label>
                                                                <select class="form-control" name="cookie_status"
                                                                    required>
                                                                    <option
                                                                        @if (CookieSetting('cookie_status') == 1) selected @endif
                                                                        value="1">{{ trans('admin.Enable') }}
                                                                    </option>
                                                                    <option
                                                                        @if (CookieSetting('cookie_status') == 0) selected @endif
                                                                        value="0">{{ trans('admin.Disable') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Cookie Consent Button') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="cookie_button"
                                                                    value="{{ CookieSetting('cookie_button') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Cookie Consent Confirmation Text') }}</label>
                                                                <textarea type="text" class="form-control h-50" name="cookie_confirmation" required>{{ filterTag(clean(CookieSetting('cookie_confirmation'))) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="payment-gateway" role="tabpanel"
                                        aria-labelledby="payment-gateway-tab">
                                        <form action="{{ route('admin.paymentsettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <ul class="nav nav-pills" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="paypal-tab" data-toggle="tab"
                                                                href="#paypal" role="tab" aria-controls="paypal"
                                                                aria-selected="true">{{ trans('admin.Paypal') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="stripe-tab" data-toggle="tab"
                                                                href="#stripe" role="tab" aria-controls="stripe"
                                                                aria-selected="false">{{ trans('admin.Stripe') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="razorpay-tab" data-toggle="tab"
                                                                href="#razorpay" role="tab" aria-controls="razorpay"
                                                                aria-selected="false">{{ trans('admin.RazorPay') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="flutterwave-tab"
                                                                data-toggle="tab" href="#flutterwave" role="tab"
                                                                aria-controls="flutterwave"
                                                                aria-selected="false">{{ trans('admin.Flutterwave') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="mollie-tab" data-toggle="tab"
                                                                href="#mollie" role="tab" aria-controls="mollie"
                                                                aria-selected="false">{{ trans('admin.Mollie') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="instamojo-tab" data-toggle="tab"
                                                                href="#instamojo" role="tab" aria-controls="instamojo"
                                                                aria-selected="false">{{ trans('admin.Instamojo') }}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="paystack-tab" data-toggle="tab"
                                                                href="#paystack" role="tab" aria-controls="paystack"
                                                                aria-selected="false">{{ trans('admin.Paystack') }}</a>
                                                        </li>



                                                        <li class="nav-item">
                                                            <a class="nav-link" id="bank-tab" data-toggle="tab"
                                                                href="#bank" role="tab" aria-controls="bank"
                                                                aria-selected="false">{{ trans('admin.Bank') }}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-4" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="paypal" role="tabpanel"
                                                            aria-labelledby="paypal-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Paypal Mode') }}</label>
                                                                <select class="form-control" name="paypal_api_mode"
                                                                    required>
                                                                    <option
                                                                        @if (PaymentGateway('paypal_api_mode') == 'sandbox') selected @endif
                                                                        value="sandbox">Sandbox
                                                                    </option>
                                                                    <option
                                                                        @if (PaymentGateway('paypal_api_mode') == 'live') selected @endif
                                                                        value="live">Live
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Paypal Api Client ID') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paypal_api_client"
                                                                    value="{{ PaymentGateway('paypal_api_client') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Paypal Api Secret') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paypal_api_secret"
                                                                    value="{{ PaymentGateway('paypal_api_secret') }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="paypal_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('paypal_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="paypal_currency">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('paypal_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }} (
                                                                    {{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('paypal_rate') }}"
                                                                    name="paypal_rate">
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="paypal_api_status"
                                                                        @if (PaymentGateway('paypal_api_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="stripe" role="tabpanel"
                                                            aria-labelledby="stripe-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Stripe Publishable Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="stripe_api_publishable_key"
                                                                    value="{{ PaymentGateway('stripe_api_publishable_key') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Stripe Secret Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="stripe_api_secret_key"
                                                                    value="{{ PaymentGateway('stripe_api_secret_key') }}"
                                                                    required>
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="stripe_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('stripe_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="stripe_currency">
                                                                    <option>--- Select ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('stripe_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('stripe_rate') }}"
                                                                    name="stripe_rate">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="stripe_api_status"
                                                                        @if (PaymentGateway('stripe_api_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="razorpay" role="tabpanel"
                                                            aria-labelledby="razorpay-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Razorpay Key ID') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="razorpay_key_id"
                                                                    value="{{ PaymentGateway('razorpay_key_id') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Razorpay Key Secret') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="razorpay_key_secret"
                                                                    value="{{ PaymentGateway('razorpay_key_secret') }}"
                                                                    required>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="razorpay_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('razorpay_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="razorpay_currency">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('razorpay_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('razorpay_rate') }}"
                                                                    name="razorpay_rate">
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="razorpay_status"
                                                                        @if (PaymentGateway('razorpay_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="flutterwave" role="tabpanel"
                                                            aria-labelledby="flutterwave-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Flutterwave Public Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="flutterwave_public_key"
                                                                    value="{{ PaymentGateway('flutterwave_public_key') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Flutterwave Secret Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="flutterwave_secret_key"
                                                                    value="{{ PaymentGateway('flutterwave_secret_key') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Flutterwave Encription Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="flutterwave_encryption_key"
                                                                    value="{{ PaymentGateway('flutterwave_encryption_key') }}"
                                                                    required>
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="flutterwave_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('flutterwave_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="flutterwave_currency">
                                                                    <option>--- Select ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('flutterwave_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('flutterwave_rate') }}"
                                                                    name="flutterwave_rate">
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="flutterwave_status"
                                                                        @if (PaymentGateway('flutterwave_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mollie" role="tabpanel"
                                                            aria-labelledby="mollie-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Mollie Email') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="mollie_email"
                                                                    value="{{ PaymentGateway('mollie_email') }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Mollie API Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="mollie_api_key"
                                                                    value="{{ PaymentGateway('mollie_api_key') }}"
                                                                    required>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="mollie_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('mollie_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="mollie_currency">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('mollie_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('mollie_rate') }}"
                                                                    name="mollie_rate">
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="mollie_status"
                                                                        @if (PaymentGateway('mollie_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="instamojo" role="tabpanel"
                                                            aria-labelledby="instamojo-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Instamojo API Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="instamojo_api_key"
                                                                    value="{{ PaymentGateway('instamojo_api_key') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Instamojo Auth Token') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="instamojo_auth_token"
                                                                    value="{{ PaymentGateway('instamojo_auth_token') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Instamojo Salt') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="instamojo_salt"
                                                                    value="{{ PaymentGateway('instamojo_salt') }}"
                                                                    required>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="instamojo_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('instamojo_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="instamojo_currency">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('instamojo_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('instamojo_rate') }}"
                                                                    name="instamojo_rate">
                                                            </div>


                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="instamojo_status"
                                                                        @if (PaymentGateway('instamojo_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="tab-pane fade" id="paystack" role="tabpanel"
                                                            aria-labelledby="paystack-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Paystack Public Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paystack_public_key"
                                                                    value="{{ PaymentGateway('paystack_public_key') }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Paystack Secret Key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paystack_secret_key"
                                                                    value="{{ PaymentGateway('paystack_secret_key') }}"
                                                                    required>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Country') }}</label>
                                                                <select class="form-control" name="paystack_country">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Countries() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('paystack_country')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency') }}</label>
                                                                <select class="form-control" name="paystack_currency">
                                                                    <option>--- {{ trans('admin.Select') }} ----</option>
                                                                    @foreach (Currencies() as $item => $val)
                                                                        <option
                                                                            @if ($item == PaymentGateway('paystack_currency')) selected @endif
                                                                            value="{{ $item }}">
                                                                            {{ $val }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Currency rate per') }}
                                                                    ({{ GetSetting('site_currency') }})</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ PaymentGateway('paystack_rate') }}"
                                                                    name="paystack_rate">
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="paystack_status"
                                                                        @if (PaymentGateway('paystack_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>



                                                        <div class="tab-pane fade" id="bank" role="tabpanel"
                                                            aria-labelledby="bank-tab">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Bank Account Information') }}</label>
                                                                <textarea rows="10" class="form-control h-100" name="bank_account_details" required>{{ filterTag(clean(PaymentGateway('bank_account_details'))) }}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="control-label">{{ trans('admin.Status') }}
                                                                </div>
                                                                <label class="custom-switch pl-0 mt-2">
                                                                    <input type="checkbox" name="bank_account_status"
                                                                        @if (PaymentGateway('bank_account_status') == 1) checked @endif
                                                                        class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span
                                                                        class="custom-switch-description">{{ trans('admin.OFF / ON') }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="re-captcha" role="tabpanel"
                                        aria-labelledby="re-captcha-tab">
                                        <form action="{{ route('admin.recaptchasettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.ReCaptcha Site Key') }}</label>
                                                        <input type="text" class="form-control" name="recaptcha_site_key"
                                                            value="{{ ReCaptcha('recaptcha_site_key') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.ReCaptcha Secret Key') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="recaptcha_secret_key"
                                                            value="{{ ReCaptcha('recaptcha_secret_key') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Allow ReCaptcha') }}</label>
                                                        <select class="form-control" name="recaptcha_status">
                                                            <option @if (ReCaptcha('recaptcha_status') == 0) selected @endif
                                                                value="0">{{ trans('admin.Disable') }}
                                                            </option>
                                                            <option @if (ReCaptcha('recaptcha_status') == 1) selected @endif
                                                                value="1">{{ trans('admin.Enable') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="google-analytic" role="tabpanel"
                                        aria-labelledby="google-analytic-tab">
                                        <form action="{{ route('admin.analyticssettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Analytics Id') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="google_analytics_id"
                                                            value="{{ GetAnalytics('google_analytics_id') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Allow Analytics') }}</label>
                                                        <select class="form-control" name="google_analytics_status">
                                                            <option @if (GetAnalytics('google_analytics_status') == 0) selected @endif
                                                                value="0">{{ trans('admin.Disable') }}
                                                            </option>
                                                            <option @if (GetAnalytics('google_analytics_status') == 1) selected @endif
                                                                value="1">{{ trans('admin.Enable') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="google-map" role="tabpanel"
                                        aria-labelledby="google-map-tab">
                                        <form action="{{ route('admin.mapsettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Map Embed Link') }}</label>
                                                        <input type="text" class="form-control" name="link"
                                                            value="{{ App\Models\GoogleMap::first()->link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="pagination-settings" role="tabpanel"
                                        aria-labelledby="pagination-settings-tab">
                                        <form action="{{ route('admin.paginationsettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Blog pagination data') }}</label>
                                                        <input type="number" class="form-control" name="blog_pagination"
                                                            value="{{ @App\Models\Setting::first()->blog_pagination }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Blog search pagination data') }}</label>
                                                        <input type="number" class="form-control"
                                                            name="blog_search_pagination"
                                                            value="{{ @App\Models\Setting::first()->blog_search_pagination }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Blog archive pagination data') }}</label>
                                                        <input type="number" class="form-control"
                                                            name="blog_archive_pagination"
                                                            value="{{ @App\Models\Setting::first()->blog_archive_pagination }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Blog tag search pagination data') }}</label>
                                                        <input type="number" class="form-control"
                                                            name="blog_tag_search_pagination"
                                                            value="{{ @App\Models\Setting::first()->blog_tag_search_pagination }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ trans('admin.Blog category pagination data') }}</label>
                                                        <input type="number" class="form-control"
                                                            name="blog_category_pagination"
                                                            value="{{ @App\Models\Setting::first()->blog_category_pagination }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="email-settings" role="tabpanel"
                                        aria-labelledby="email-settings-tab">
                                        <form action="{{ route('admin.mailsettings') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Mail Host') }}</label>
                                                                <input type="text" class="form-control" name="mail_host"
                                                                    value="{{ MailConfig('mail_host') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Sender Name') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="mail_sent_from"
                                                                    value="{{ MailConfig('mail_sent_from') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Sender Email') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="mail_sent_from_email"
                                                                    value="{{ MailConfig('mail_sent_from_email') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.SMTP Username') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="smtp_username"
                                                                    value="{{ MailConfig('smtp_username') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.SMTP Password') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="smtp_password"
                                                                    value="{{ MailConfig('smtp_password') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Mail Port') }}</label>
                                                                <input type="text" class="form-control" name="mail_port"
                                                                    value="{{ MailConfig('mail_port') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ trans('admin.Mail Encription') }}</label>
                                                                <select class="form-control" name="mail_encryption">
                                                                    <option
                                                                        @if (MailConfig('mail_encryption') == 'tls') selected @endif
                                                                        value="tls">{{ trans('admin.TLS') }}
                                                                    </option>
                                                                    <option
                                                                        @if (MailConfig('mail_encryption') == 'ssl') selected @endif
                                                                        value="ssl">{{ trans('admin.SSL') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card border">
                                                <div class="card-body">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">{{ trans('admin.Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="email-template" role="tabpanel"
                                        aria-labelledby="email-template-tab">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{{ trans('admin.Name') }}</th>
                                                                <th>{{ trans('admin.Subject') }}</th>
                                                                <th>{{ trans('admin.Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (App\Models\EmailTemplate::all() as $template)
                                                                <tr>
                                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                                    <td>{{ $template->name }}</td>
                                                                    <td>{{ $template->subject }}</td>
                                                                    <td>
                                                                        <a class="btn btn-primary"
                                                                            href="{{ route('admin.email-template.edit', $template->id) }}"
                                                                            role="button"> {{ trans('admin.Edit') }} </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="factory-settings" role="tabpanel"
                                        aria-labelledby="factory-settings">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a class="btn btn-primary btn-lg btn-block mb-4"
                                                            href="{{ route('admin.backup') }}" role="button">
                                                            <i class="fas fa-database    "></i>
                                                            {{ trans('admin.Backup') }}</a>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <a class="btn btn-primary btn-lg btn-block mb-4 reset"
                                                            href="{{ route('admin.reset') }}" role="button">
                                                            <i class="fas fa-database    "></i>
                                                            {{ trans('admin.Reset Database') }}</a>
                                                    </div>


                                                    <div class="col-12">
                                                        <form action="{{ route('admin.restore') }}" method="POST"
                                                            enctype="multipart/form-data" class="border p-4">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">{{ trans('admin.Restore') }}</label>
                                                                <div class="border p-4"><input type="file"
                                                                        class="form-control-file" name="backup" required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-block mt-4">

                                                                    <i class="fas fa-sync    "></i>

                                                                    {{ trans('admin.Restore') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>


                                                    @if (checkMaintenance())
                                                        <div class="col-md-12 mt-4">


                                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                {{ trans('admin.Note! Application is in maintanance mode.') }}
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>

                                                            <a class="btn btn-danger btn-lg btn-block mb-4"
                                                                href="{{ route('admin.maintenance') }}" role="button"> <i
                                                                    class="fas fa-wrench    "></i>
                                                                {{ trans('admin.Deactive Maintenance Mode') }} </a>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12 mt-4">
                                                            <a class="btn btn-primary btn-lg btn-block mb-4"
                                                                href="{{ route('admin.maintenance') }}" role="button"> <i
                                                                    class="fas fa-wrench    "></i>
                                                                {{ trans('admin.Active Maintenance Mode') }} </a>
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.layouts.mediaModal')
@endsection
@push('script')
    <script src="{{ asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>

    <script>
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });

        $(function() {
            $('.cp-1').colorpicker();
            $('.cp-prev-1').css('background-color', $('.cp-1').val().toString());
            $('.cp-1').on('colorpickerChange', function(event) {
                $('.cp-prev-1').css('background-color', event.color.toString());
            });
            $('.cp-2').colorpicker();
            $('.cp-prev-2').css('background-color', $('.cp-2').val().toString());
            $('.cp-2').on('colorpickerChange', function(event) {
                $('.cp-prev-2').css('background-color', event.color.toString());
            });
        });
    </script>



    <script>
        $(document).on('click', '.reset', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            Swal.fire({
                title: '{{ trans('admin.Are you sure?') }}',
                text: "{{ trans('admin.You wont be able to revert this!') }}",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ trans('admin.Reset!') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {

                            @if (checkDemo())
                                {
                                    toastr.error(
                                        '{{ trans('admin.This action is blocked in demo mode!') }}'
                                        );
                                } else {

                                    Swal.fire(
                                            '{{ trans('admin.Successful!') }}',
                                            '{{ trans('admin.Reset completed.') }}',
                                            '{{ trans('admin.success') }}'
                                        )
                                        .then((result) => {
                                            location.reload()
                                        })

                                }
                            @endif

                        }
                    });
                }
            })
        });
    </script>
    @include('admin.layouts.mediaJs')
@endpush
