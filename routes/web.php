<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FooterContactItemController;
use App\Http\Controllers\Admin\FooterInformationController;
use App\Http\Controllers\Admin\FooterLinkController;
use App\Http\Controllers\Admin\FrontendLanguageController;
use App\Http\Controllers\Admin\HeaderContactController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Admin\MediaManagerController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\Admin\PagePreviewController;
use App\Http\Controllers\Admin\ParallaxController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\DependentDropdownController;
use App\Http\Controllers\Admin\MudikBusController;
use App\Http\Controllers\Admin\MudikKotaController;
use App\Http\Controllers\Admin\MudikPeriodeController;
use App\Http\Controllers\Admin\MudikPesertaController;
use App\Http\Controllers\Admin\MudikProvinsiController;
use App\Http\Controllers\Admin\MudikTujuanController;
use App\Http\Controllers\Admin\MudikVerifikasiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShippingCountryController;
use App\Http\Controllers\Admin\ShopDiscountController;
use App\Http\Controllers\Admin\ShopServiceController;
use App\Http\Controllers\Admin\ShopSettingController;
use App\Http\Controllers\Admin\ShopSliderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\StatisticItemController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TermsOfUseController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserDataController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\DynamicPageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\UserPanelController;
use App\Http\Controllers\Frontend\Auth\UserLoginController;
use App\Http\Controllers\Frontend\Auth\UserRegisterController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\PaypalController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\RuteController;
use App\Http\Controllers\Frontend\StatisticController as FrontendStatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;




Route::group(['middleware' => ['XSS', 'HtmlSpecialchars', 'visitor']], function () {

    Route::get('lang', function () {

        generateLangFrontend('views/frontend', 'lang/en/frontend.php');
        generateLangBackend('views/admin', 'lang/en/admin.php');
    });

    // Admin Routes
    Route::get('/admin/login',   [AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
    Route::post('/admin/login',  [AdminLoginController::class, 'adminCheckLogin'])->name('admin.login');
    Route::post('/admin/logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout');


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {

        // Dashoboard
        Route::get('/',          [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Menu Builder Routes
        Route::get('/menubuilder/menu_items', [MenuBuilderController::class, 'menu_items'])->name('menu_items');
        Route::get('/menubuilder',            [MenuBuilderController::class, 'index'])->name('menubuilder');
        Route::get('/menubuilder/addmenu',    [MenuBuilderController::class, 'addmenu'])->name('addmenu');
        Route::get('/menubuilder/editmenu',   [MenuBuilderController::class, 'editmenu'])->name('editmenu');
        Route::get('/menubuilder/deletemenu', [MenuBuilderController::class, 'deletemenu'])->name('deletemenu');
        Route::get('/menubuilder/addsubmenu', [MenuBuilderController::class, 'addsubmenu'])->name('addsubmenu');
        Route::get('/menubuilder/sortmenu',   [MenuBuilderController::class, 'sortmenu'])->name('sortmenu');

        //Media Manager Routes
        Route::get('/showmanager',          [MediaManagerController::class, 'showmanager'])->name('showmanager');
        Route::get('/mediamanager',         [MediaManagerController::class, 'index'])->name('mediamanager');
        Route::post('/mediamanager/upload', [MediaManagerController::class, 'upload'])->name('mediaupload');
        Route::get('/mediamanager/images',  [MediaManagerController::class, 'images'])->name('mediaimages');
        Route::get('/mediamanager/delete/', [MediaManagerController::class, 'delete'])->name('media.delete');

        Route::get('/settings',             [SettingsController::class,     'settings'])->name('settings');


        // Settings Routes

        Route::get('/contact-message',      [SettingsController::class, 'contact_message'])->name('contact_message');
        Route::put('/genral/settings',      [SettingsController::class, 'savegeneralsettings'])->name('generalsettings');
        Route::put('/pagination/settings',      [SettingsController::class, 'paginationsettings'])->name('paginationsettings');
        Route::put('/cookie/settings',      [SettingsController::class, 'savecookiesettings'])->name('cookiesettings');
        Route::put('/payment/settings',     [SettingsController::class, 'savepaymentsettings'])->name('paymentsettings');
        Route::put('/recaptcha/settings',   [SettingsController::class, 'saverecaptchasettings'])->name('recaptchasettings');
        Route::put('/analytics/settings',   [SettingsController::class, 'saveanalyticstsettings'])->name('analyticssettings');
        Route::put('/email/settings',       [SettingsController::class, 'savemailsettings'])->name('mailsettings');
        Route::put('/google-map/settings',  [SettingsController::class, 'mapsettings'])->name('mapsettings');

        Route::get('/backup',      [UserDataController::class, 'backup'])->name('backup');
        Route::post('/restore',     [UserDataController::class, 'restore'])->name('restore');
        Route::get('/maintenance',      [UserDataController::class, 'maintenance_mode'])->name('maintenance');
        Route::get('/reset',      [UserDataController::class, 'reset'])->name('reset');

        //  Page Builder
        Route::resource('page-builder',   PageBuilderController::class);
        Route::resource('page-preview',   PagePreviewController::class);

        // Localization
        Route::resource('frontend-language',   FrontendLanguageController::class);
        Route::resource('admin-language',   AdminLanguageController::class);


        // Email
        Route::resource('email-template', EmailTemplateController::class);
        Route::resource('subscriber',     SubscriberController::class);
        Route::resource('send-email',     SendEmailController::class);

        // Blog
        Route::resource('blog',            BlogController::class);
        Route::resource('blog-category',   BlogCategoryController::class);
        Route::resource('blog-comment',    BlogCommentController::class);
        Route::resource('appointment',     AppointmentController::class);
        Route::resource('contact-messages', ContactMessageController::class);

        // Components
        Route::resource('slider',           SliderController::class);
        Route::resource('faq',              FaqController::class);
        Route::resource('service',          ServiceController::class);
        Route::resource('testimonial',      TestimonialController::class);
        Route::resource('intro',            IntroController::class);
        Route::resource('about',            AboutController::class);
        Route::resource('parallax',         ParallaxController::class);
        Route::resource('statistic',        StatisticController::class);
        Route::resource('statistic-item',   StatisticItemController::class);
        Route::resource('sponsor',          SponsorController::class);

        // Shop
        Route::resource('product',          ProductController::class);
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('order',            OrderController::class);
        Route::resource('transaction',      TransactionController::class);
        Route::resource('product-review',   ProductReviewController::class);

        Route::resource('shop-slider',      ShopSliderController::class);
        Route::resource('shop-service',     ShopServiceController::class);
        Route::resource('shop-discount',    ShopDiscountController::class);
        Route::resource('shop-setting',     ShopSettingController::class);
        Route::resource('shipping-country', ShippingCountryController::class);
        // portfolio
        Route::resource('portfolio',        PortfolioController::class);
        // Footer
        Route::resource('header-contact',      HeaderContactController::class);
        Route::resource('social-link',         SocialLinkController::class);
        Route::resource('footer-link',         FooterLinkController::class);
        Route::resource('footer-information',  FooterInformationController::class);
        Route::resource('footer-contact-item', FooterContactItemController::class);


        Route::resource('contact-page',      ContactPageController::class);
        Route::resource('terms-of-use',      TermsOfUseController::class);
        Route::resource('privacy-policy',    PrivacyPolicyController::class);
        Route::resource('user-profile',      UserProfileController::class);

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        /** Mudik */
        Route::resource('mudik-periode', MudikPeriodeController::class);
        Route::resource('mudik-tujuan', MudikTujuanController::class);
        Route::resource('mudik-kota', MudikKotaController::class);
        Route::get('admin/mudik-kota/provinsi', [MudikKotaController::class,'provinsi'])->name('mudik-kota.provinsi');;
        Route::resource('mudik-bus', MudikBusController::class);
        Route::resource('mudik-peserta', MudikPesertaController::class);
        Route::resource('mudik-provinsi', MudikProvinsiController::class);
        Route::resource('mudik-verifikasi', MudikVerifikasiController::class);
    });


    Route::group(['middleware' => ['auth']], function () {

        /**
         * Verification Routes
         */
        Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    });


    // Frontend
    Route::get('/',                     [DynamicPageController::class,  'index'])->name('home');
    Route::get('blogs',                 [FrontendBlogController::class, 'index'])->name('blogs');
    Route::get('blog/search',           [FrontendBlogController::class, 'search'])->name('blog_search');
    Route::get('blog/search-tag/{tag}', [FrontendBlogController::class, 'search_tag'])->name('blog_tag');
    Route::get('blog/archive/{range}',  [FrontendBlogController::class, 'archive'])->name('blog_archive');
    Route::get('blog/category/{slug}',  [FrontendBlogController::class, 'category'])->name('blog_category');
    Route::get('blog/{slug}',           [FrontendBlogController::class, 'show'])->name('blog_show');
    Route::post('blog/comment/{blog}',  [FrontendBlogController::class, 'comment'])->name('blog_comment');
    Route::get('service/{slug}',        [FrontendServiceController::class, 'show'])->name('service_show');
    Route::get('news_letter',          [HomePageController::class,     'news_letter'])->name('news_letter');
    Route::get('appointment-form',     [HomePageController::class,     'appointment'])->name('appointment');
    Route::post('appointment-submit',  [HomePageController::class,     'appointment_submit'])->name('appointment-submit');
    Route::get('shop',                  [ShopController::class, 'index'])->name('blogs');
    Route::get('shop/product/{slug}',   [ShopController::class, 'product'])->name('product');
    Route::get('portfolio/{slug}',      [FrontendPortfolioController::class, 'portfolio'])->name('portfolio');
    Route::get('product_quickview',     [ShopController::class, 'product_quickview'])->name('product_quickview');
    Route::post('contact-message',      [HomePageController::class, 'contact_message'])->name('contact_message');


    Route::get('cart-fetch',            [ShopController::class,     'cart_fetch'])->name('cart_fetch');
    Route::get('cart-page',             [ShopController::class,     'cart_page'])->name('cart_page');
    Route::get('cart-add',              [HomePageController::class, 'cart_add'])->name('cart_add');
    Route::get('cart-remove',           [HomePageController::class, 'cart_remove'])->name('cart_remove');
    Route::get('cart-quantity',         [HomePageController::class, 'cart_quantity'])->name('cart_quantity');
    Route::get('cart-clear',            [HomePageController::class, 'cart_clear'])->name('cart_clear');

    // Login Routes
    Route::get('/login',                [UserLoginController::class,    'userLoginForm'])->name('user.login');
    Route::post('/login',               [UserLoginController::class,    'userCheckLogin'])->name('user.login');
    Route::get('/register',             [UserRegisterController::class, 'userRegisterForm'])->name('user.register');
    Route::post('/register',            [UserRegisterController::class, 'register'])->name('user.register');
    Route::get('/register/cities',      [UserRegisterController::class, 'userRegisterCities'])->name('user.register.cities');


    Route::post('/logout',              [UserLoginController::class,    'userLogout'])->name('user.logout');
    Route::get('/forgot',               [ForgotPasswordController::class, 'forgot'])->name('user.forgot');
    Route::post('/forgot',              [ForgotPasswordController::class, 'resetLink'])->name('user.forgot');
    Route::get('/password-reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('user.reset');
    Route::post('/password-reset',      [ResetPasswordController::class, 'resetPassword'])->name('user.reset');
    Route::get('/email-subscribe/{token}', [HomePageController::class, 'news_letter_verify'])->name('news.letter.verify');

    Route::get('/rute', [RuteController::class, 'index'])->name('rute');
    Route::get('/statistik-peserta', [FrontendStatisticController::class, 'index'])->name('statistik-peserta');

    Route::get('{slug}',                [DynamicPageController::class, 'page'])->name('page');

    Route::group(['as' => 'user.', 'middleware' => ['auth:web', 'verified'], 'prefix' => 'user'], function () {

        Route::post('product/review',   [ShopController::class,      'review'])->name('review');
        Route::get('shop/cart',         [ShopController::class,      'cart'])->name('cart');

        Route::post('/update-profile',  [UserPanelController::class, 'update_profile'])->name('update');
        Route::post('/shipping-address',  [UserPanelController::class, 'shipping_address'])->name('shipping-address');


        Route::get('/dashboard',        [UserPanelController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile',          [UserPanelController::class, 'profile'])->name('profile');
        Route::get('/transactions',     [UserPanelController::class, 'transactions'])->name('transactions');
        Route::get('/profile/delete',   [UserPanelController::class, 'delete'])->name('profile.delete');

        Route::post('/sslcommerz-pay',    [PaymentController::class,   'sslcommerz'])->name('sslcommerz-pay');
        Route::post('/sslcommerz-success', [PaymentController::class,   'sslcommerz_success'])->name('sslcommerz-success');
        Route::post('/sslcommerz-failed', [PaymentController::class,   'sslcommerz_failed'])->name('sslcommerz-failed');
        Route::post('/sslcommerz-cancel', [PaymentController::class,   'sslcommerz_cancel'])->name('sslcommerz-cancel');

        Route::get('/pay-with-paypal',       [PaypalController::class,   'paypal_pay'])->name('pay-with-paypal');
        Route::get('/paypal-payment-success',       [PaypalController::class,   'paypal_success'])->name('paypal-payment-success');
        Route::get('/paypal-payment-cancled',       [PaypalController::class,   'paypal_cancel'])->name('paypal-payment-cancled');

        Route::post('/bank-pay',        [PaymentController::class,   'bank'])->name('bank-pay');
        Route::post('/stripe-pay',      [PaymentController::class,   'stripe'])->name('stripe-pay');
        Route::post('/razorpay-pay',    [PaymentController::class,   'razorpay'])->name('razorpay-pay');
        Route::post('/mollie-pay',      [PaymentController::class,   'mollie'])->name('mollie-pay');
        Route::get('/mollie-notify',    [PaymentController::class,   'mollie_notify'])->name('mollie-notify');
        Route::post('/instamojo-pay',   [PaymentController::class,   'instamojo'])->name('instamojo-pay');
        Route::get('/instamojo-verify', [PaymentController::class,   'instamojo_verify'])->name('instamojo-verify');
        Route::get('/paystack-pay',     [PaymentController::class,   'paystack'])->name('paystack-pay');
        Route::get('/flutterwave-pay', [PaymentController::class,   'flutterwave'])->name('flutterwave-pay');

        Route::get('/provinces', [DependentDropdownController::class, 'provinces'])->name('provinces');
        Route::get('/cities', [DependentDropdownController::class, 'cities'])->name('cities');
        Route::get('/districts', [DependentDropdownController::class, 'districts'])->name('districts');
        Route::get('/villages', [DependentDropdownController::class, 'villages'])->name('villages');

        Route::get('/peserta',     [UserPanelController::class, 'peserta'])->name('peserta');
        Route::get('/kendaraan',     [UserPanelController::class, 'kendaraan'])->name('kendaraan');
        Route::get('/peserta/create',     [UserPanelController::class, 'peserta_create'])->name('peserta.create');
        Route::post('/peserta/store',     [UserPanelController::class, 'peserta_store'])->name('peserta.store');
        Route::get('/peserta/{id}/edit',     [UserPanelController::class, 'peserta_edit'])->name('peserta.edit');
        Route::get('/peserta/{id}/eticket',     [UserPanelController::class, 'peserta_eticket'])->name('peserta.eticket');
        Route::post('/peserta/update',     [UserPanelController::class, 'peserta_update'])->name('peserta.update');
        Route::get('/peserta/delete',     [UserPanelController::class, 'peserta_delete'])->name('peserta.delete');
        Route::get('/peserta/cancel',     [UserPanelController::class, 'peserta_cancel'])->name('peserta.cancel');
        Route::post('/peserta/store_cancel',     [UserPanelController::class, 'store_cancel'])->name('peserta.store_cancel');
    });
});
