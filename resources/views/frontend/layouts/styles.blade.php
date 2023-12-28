@if (GetSetting('preloader_enabled') == true)
    @if (GetSetting('preloader_style') == 1)
    <link href="{{asset('assets/frontend/css/preloaders/preloader_one.css')}}" rel="stylesheet" type="text/css">
    @elseif(GetSetting('preloader_style') == 2)
    <link href="{{asset('assets/frontend/css/preloaders/preloader_two.css')}}" rel="stylesheet" type="text/css">
    @elseif(GetSetting('preloader_style') == 3)
    <link href="{{asset('assets/frontend/css/preloaders/preloader_three.css')}}" rel="stylesheet" type="text/css">
    @elseif(GetSetting('preloader_style') == 4)
    <link href="{{asset('assets/frontend/css/preloaders/preloader_four.css')}}" rel="stylesheet" type="text/css">
    @elseif(GetSetting('preloader_style') == 5)
    <link href="{{asset('assets/frontend/css/preloaders/preloader_five.css')}}" rel="stylesheet" type="text/css">
    @endif
@endif

@if (GetSetting('site_direction') == 'LTR')
    <!-- Favicon and Touch Icons -->
    <link href="{{asset(GetSetting('site_favicon'))}}" rel="shortcut icon" type="image/png">
    <!-- Stylesheet -->
    <link href="{{asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/javascript-plugins-bundle.css')}}" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="{{asset('assets/frontend/js/menuzord/css/menuzord.css')}}" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="{{asset('assets/frontend/css/style-main.css')}}" rel="stylesheet" type="text/css">
    <link id="menuzord-menu-skins" href="{{asset('assets/frontend/css/menuzord-skins/menuzord-rounded-boxed.css')}}"
        rel="stylesheet" />
    <!-- CSS | Responsive media queries -->
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- CSS | Theme Color -->
    <link href="{{asset('assets/frontend/css/colors/theme-skin-color-set1.css')}}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/js/revolution-slider/css/rs6.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider1.css')}}">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider-shop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/toastr/toastr.min.css')}}">
@else
    <link href="{{asset(GetSetting('site_favicon'))}}" rel="shortcut icon" type="image/png">
    <!-- Stylesheet -->
    <link href="{{asset('assets/frontend/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/javascript-plugins-bundle.css')}}" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="{{asset('assets/frontend/js/menuzord/css/menuzord.css')}}" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="{{asset('assets/frontend/css/style-main-rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/frontend/css/style-main-rtl-extra.css')}}" rel="stylesheet" type="text/css">
    <link id="menuzord-menu-skins"
        href="{{asset('assets/frontend/css/menuzord-skins/menuzord-rounded-boxed.css')}}" rel="stylesheet" />
    <!-- CSS | Responsive media queries -->
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- CSS | Theme Color -->
    <link href="{{asset('assets/frontend/css/colors/theme-skin-color-set1.css')}}" rel="stylesheet"
        type="text/css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/js/revolution-slider/css/rs6.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider1.css')}}">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/frontend/js/revolution-slider/extra-rev-slider-shop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/toastr/toastr.min.css')}}">
@endif
<link rel="stylesheet" href="{{asset('assets/frontend/css/select2.css')}}">
@stack('styles')
<style>
    :root {
        --theme-color1: {{GetSetting('site_primary_color')}} !important;
        --theme-color1-rgb: 7, 149, 254 !important;
        --theme-color2: {{GetSetting('site_secondary_color')}} !important;
        --theme-color2-rgb: 9, 42, 73 !important;
        --theme-color3: {{GetSetting('site_primary_color')}} !important;
        --theme-color3-rgb: 60, 114, 252 !important;
        --theme-color4: {{GetSetting('site_secondary_color')}} !important;
        --theme-color4-rgb: 0, 58, 107 !important;
        --text-color-bg-theme-color1: #fff !important;
        --text-color-bg-theme-color2: #fff !important;
        --text-color-bg-theme-color3: #fff !important;
        --text-color-bg-theme-color4: #fff !important;
    }

    a {
        color: {{GetSetting('site_primary_color')}};
    }

    a:hover {
        color: {{GetSetting('site_secondary_color')}};
    }

    .icon-theme-colored1.icon-dark a {
        background-color: {{GetSetting('site_primary_color')}};
    }

    .icon-theme-colored1.icon-dark a:hover {
        background-color: {{GetSetting('site_primary_color')}}90;
    }

    .btn-theme-colored1 {
        background-color: {{GetSetting('site_secondary_color')}};
        border-color: {{GetSetting('site_secondary_color')}};
    }

    .btn-theme-colored1:hover {
        background-color: {{GetSetting('site_secondary_color')}};
        border-color: {{GetSetting('site_secondary_color')}};
    }

    .btn-theme-colored2 {
        background-color: {{GetSetting('site_secondary_color')}};
    }

    .btn-theme-colored2:hover {
        background-color: {{GetSetting('site_secondary_color')}};
    }

    .bg-theme-colored1 {
        background-color: {{GetSetting('site_primary_color')}} !important;
    }

    .text-theme-colored1 {
        color: {{GetSetting('site_primary_color')}} !important;
    }

    .bg-theme-colored2 {
        background-color: {{GetSetting('site_secondary_color')}} !important;
    }

    .text-primary {
        color: {{GetSetting('site_primary_color')}} !important;
    }

    .icon-box.iconbox-theme-colored1 .icon.icon-dark {
        background-color: {{GetSetting('site_primary_color')}} !important;
    }

    .side-nav ul li a.active {
        background-color: {{GetSetting('site_primary_color')}} !important;
    }

    .side-nav ul li a {
        background-color: {{GetSetting('site_primary_color')}}90 !important;
    }

    .pagination>.page-item .page-link:hover {
        background-color: {{GetSetting('site_primary_color')}} !important;
        border-color: {{GetSetting('site_primary_color')}} !important;
        color: #fff;
    }

    .pagination>.page-item.active .page-link {
        border-color: {{GetSetting('site_primary_color')}} !important;
    }

    .newsletter-btn.btn.btn-theme-colored2.text-white {
        background-color: {{GetSetting('site_secondary_color')}} !important;
    }

    .newsletter-btn.btn.btn-theme-colored2.text-white:before {
        background-color: {{GetSetting('site_primary_color')}}90 !important;
    }

    .icon-box.iconbox-theme-colored1 .icon {
        color: {{GetSetting('site_primary_color')}};
    }

    .tm-accordion.accordion-classic.accordion-theme-colored1 .accordion-item .accordion-header .accordion-button:not(.collapsed) {
        background-color: {{GetSetting('site_primary_color')}};
    }

    .tm-accordion.accordion-theme-colored1 .accordion-item {
        border-color: {{GetSetting('site_secondary_color')}};
    }

    .scrollToTop {
        background-image: linear-gradient(to right, {{GetSetting('site_primary_color')}} 0%, {{GetSetting('site_primary_color')}} 51%, {{GetSetting('site_primary_color')}} 100%);
    }

    .btn-plain-text-with-arrow:before {
        color: {{GetSetting('site_primary_color')}};
    }

    .btn-plain-text-with-arrow:hover {
        color: {{GetSetting('site_primary_color')}};
    }

    .widget.widget_archive ul>li::before,
    .widget.widget_categories ul>li::before,
    .widget.widget_pages ul>li::before,
    .widget.widget_meta ul>li::before,
    .widget.widget_recent_comments ul>li::before,
    .widget.widget_rss ul>li::before,
    .widget.widget_nav_menu ul>li::before {
        color: {{GetSetting('site_primary_color')}};
    }

</style>
