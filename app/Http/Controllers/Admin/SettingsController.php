<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cookie;
use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\GoogleAnalytic;
use App\Models\GoogleMap;
use App\Models\GoogleRecaptcha;
use App\Models\PaymentGateway;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SettingsController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:settings-index|settings-create|settings-edit|settings-delete', ['only' => ['index','show']]);
         $this->middleware('permission:settings-create', ['only' => ['create','store']]);
         $this->middleware('permission:settings-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
    }

    public function settings()
    {
        return view('admin.settings');
    }
    public function savegeneralsettings(Request $request)
    {
        $general = Setting::first();
        $general->site_name         = $request->site_name;
        $general->site_description  = $request->site_description;
        $general->site_tags         = $request->site_tags;
        $general->site_time_zone    = $request->site_time_zone;
        $general->site_currency     = $request->site_currency;
        $general->site_currency_icon = $request->site_currency_icon;
        $general->site_direction    = $request->site_direction;
        $general->site_primary_color = $request->site_primary_color;
        $general->site_secondary_color = $request->site_secondary_color;

        $general->site_header       = $request->site_header;
        $general->site_footer       = $request->site_footer;

        $general->site_logo = $request->site_logo;
        $general->site_favicon = $request->site_favicon;

        $general->section_icon       = $request->section_icon;
        $general->footer_logo       = $request->footer_logo;



        $general->blog_pagination = $request->blog_pagination;
        $general->blog_search_pagination = $request->blog_search_pagination;
        $general->blog_archive_pagination = $request->blog_archive_pagination;
        $general->blog_tag_search_pagination = $request->blog_tag_search_pagination;
        $general->blog_category_pagination = $request->blog_category_pagination;

        $general->preloader_enabled       = $request->preloader_enabled;
        $general->preloader_style       = $request->preloader_style;

        $general->save();



        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function cookiesettings()
    {
        return view('admin.cookiesettings');
    }
    public function savecookiesettings(Request $request)
    {
        $cookie = Cookie::first();
        $cookie->cookie_status = $request->cookie_status;
        $cookie->cookie_button = $request->cookie_button;
        $cookie->cookie_confirmation = $request->cookie_confirmation;
        $cookie->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function savepaymentsettings(Request $request)
    {



        if (PaymentGateway::first()) {
            $paymentsettings = PaymentGateway::first();
        } else {
            $paymentsettings = new PaymentGateway();
        }
        $paymentsettings->paypal_api_mode            = $request->paypal_api_mode;
        $paymentsettings->paypal_api_client          = $request->paypal_api_client;
        $paymentsettings->paypal_api_secret          = $request->paypal_api_secret;

        $paymentsettings->paypal_country          = $request->paypal_country;
        $paymentsettings->paypal_currency          = $request->paypal_currency;
        $paymentsettings->paypal_rate          =  $request->paypal_rate;
        if ($request->paypal_api_status == 'on') {
            $paymentsettings->paypal_api_status = 1;
        } else $paymentsettings->paypal_api_status = 0;


        $paymentsettings->ssl_commerz_store_id       = $request->ssl_commerz_store_id;
        $paymentsettings->ssl_commerz_store_password = $request->ssl_commerz_store_password;
        $paymentsettings->ssl_commerz_country          = $request->ssl_commerz_country;
        $paymentsettings->ssl_commerz_currency          = $request->ssl_commerz_currency;
        $paymentsettings->ssl_commerz_rate          = $request->ssl_commerz_rate;

        if ($request->ssl_commerz_is_sandbox == 'on') {
            $paymentsettings->ssl_commerz_is_sandbox = 1;
        } else $paymentsettings->ssl_commerz_is_sandbox = 0;
        if ($request->ssl_commerz_status == 'on') {
            $paymentsettings->ssl_commerz_status = 1;
        } else $paymentsettings->ssl_commerz_status = 0;


        $paymentsettings->stripe_api_publishable_key = $request->stripe_api_publishable_key;
        $paymentsettings->stripe_api_secret_key      = $request->stripe_api_secret_key;
        $paymentsettings->stripe_country          = $request->stripe_country;
        $paymentsettings->stripe_currency          = $request->stripe_currency;
        $paymentsettings->stripe_rate          = $request->stripe_rate;

        if ($request->stripe_api_status == 'on') {
            $paymentsettings->stripe_api_status = 1;
        } else $paymentsettings->stripe_api_status = 0;
        $paymentsettings->razorpay_key_id = $request->razorpay_key_id;
        $paymentsettings->razorpay_key_secret      = $request->razorpay_key_secret;
        $paymentsettings->razorpay_country          = $request->razorpay_country;
        $paymentsettings->razorpay_currency          = $request->razorpay_currency;
        $paymentsettings->razorpay_rate          = $request->razorpay_rate;
        if ($request->razorpay_status == 'on') {
            $paymentsettings->razorpay_status = 1;
        } else $paymentsettings->razorpay_status = 0;
        $paymentsettings->flutterwave_public_key = $request->flutterwave_public_key;
        $paymentsettings->flutterwave_secret_key      = $request->flutterwave_secret_key;
        $paymentsettings->flutterwave_encryption_key      = $request->flutterwave_encryption_key;
        $paymentsettings->flutterwave_country          = $request->flutterwave_country;
        $paymentsettings->flutterwave_currency          = $request->flutterwave_currency;
        $paymentsettings->flutterwave_rate          = $request->flutterwave_rate;
        if ($request->flutterwave_status == 'on') {
            $paymentsettings->flutterwave_status = 1;
        } else $paymentsettings->flutterwave_status = 0;
        $paymentsettings->instamojo_api_key = $request->instamojo_api_key;
        $paymentsettings->instamojo_auth_token      = $request->instamojo_auth_token;
        $paymentsettings->instamojo_salt      = $request->instamojo_salt;
        $paymentsettings->instamojo_country          = $request->instamojo_country;
        $paymentsettings->instamojo_currency          = $request->instamojo_currency;
        $paymentsettings->instamojo_rate          = $request->instamojo_rate;
        if ($request->instamojo_status == 'on') {
            $paymentsettings->instamojo_status = 1;
        } else $paymentsettings->instamojo_status = 0;


        $paymentsettings->mollie_email = $request->mollie_email;
        $paymentsettings->mollie_api_key      = $request->mollie_api_key;
        $paymentsettings->mollie_country          = $request->mollie_country;
        $paymentsettings->mollie_currency          = $request->mollie_currency;
        $paymentsettings->mollie_rate          = $request->mollie_rate;
        if ($request->mollie_status == 'on') {
            $paymentsettings->mollie_status = 1;
        } else $paymentsettings->mollie_status = 0;


        $paymentsettings->paystack_public_key = $request->paystack_public_key;
        $paymentsettings->paystack_secret_key      = $request->paystack_secret_key;
        $paymentsettings->paystack_country          = $request->paystack_country;
        $paymentsettings->paystack_currency          = $request->paystack_currency;
        $paymentsettings->paystack_rate          = $request->paystack_rate;
        if ($request->paystack_status == 'on') {
            $paymentsettings->paystack_status = 1;
        } else $paymentsettings->paystack_status = 0;
        $paymentsettings->bank_account_details       = $request->bank_account_details;
        if ($request->bank_account_status == 'on') {
            $paymentsettings->bank_account_status = 1;
        } else $paymentsettings->bank_account_status = 0;
        $paymentsettings->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function saverecaptchasettings(Request $request)
    {
        $recaptcha =  GoogleRecaptcha::first();
        $recaptcha->recaptcha_site_key = $request->recaptcha_site_key;
        $recaptcha->recaptcha_secret_key = $request->recaptcha_secret_key;
        if ($request->recaptcha_status == 1) {
            $recaptcha->recaptcha_status = 1;
        } else $recaptcha->recaptcha_status = 0;
        $recaptcha->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function saveanalyticstsettings(Request $request)
    {
        $analytics =  GoogleAnalytic::first();
        $analytics->google_analytics_id = $request->google_analytics_id;
        if ($request->google_analytics_status == 1) {
            $analytics->google_analytics_status = 1;
        } else $analytics->google_analytics_status = 0;
        $analytics->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function savemailsettings(Request $request)
    {
        $mail =  EmailSetting::first();
        $mail->mail_host = $request->mail_host;
        $mail->smtp_username = $request->smtp_username;
        $mail->smtp_password = $request->smtp_password;
        $mail->mail_port = $request->mail_port;
        $mail->mail_sent_from = $request->mail_sent_from;
        $mail->mail_sent_from_email = $request->mail_sent_from_email;
        $mail->mail_encryption = $request->mail_encryption;
        $mail->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function mapsettings(Request $request)
    {
        $map =  GoogleMap::first();
        $map->link = $request->link;
        $map->save();
        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
    public function editemailtemplate(Request $request)
    {
        $template = EmailTemplate::findOrFail($request->id);
        return view('admin.editemailtemplate', compact('template'));
    }
    public function contact_message()
    {

        $setting = Setting::first();

        if (GetSetting('save_contact_message') == 1) {
            $setting->save_contact_message = 0;
            $setting->save();
            return response([
                'message' => trans('admin.Message Setting Updated!')
            ]);
        }

        $setting->save_contact_message = 1;
        $setting->save();

        return response([
            'message' => trans('admin.Message Setting Updated!')
        ]);
    }

    public function paginationsettings(Request $request)
    {
        $general = Setting::first();
        $general->blog_pagination = $request->blog_pagination;
        $general->blog_search_pagination = $request->blog_search_pagination;
        $general->blog_archive_pagination = $request->blog_archive_pagination;
        $general->blog_tag_search_pagination = $request->blog_tag_search_pagination;
        $general->blog_category_pagination = $request->blog_category_pagination;
        $general->save();



        $notification = trans('admin.Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }
}
