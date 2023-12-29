<!DOCTYPE html>
<html @if (GetSetting('site_direction') == "RTL") dir="rtl" @else dir="ltr" @endif lang="en">
<head>


    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link href="{{ url(GetSetting('site_favicon')) }}" rel="icon">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <meta name="description" content="{{GetSetting('site_name')}} - {{@$description ? $description :  GetSetting('site_description')}}" />
    <meta name="keywords" content="{{@$content_tags ? $content_tags : GetSetting('site_tags')}}" />
    <meta name="author" content="{{GetSetting('site_name')}}" />

    <meta property="og:type" content="{{@$content_type ? $content_type : 'website'}}" />
    <meta property="og:image" content="{{@$content_image ? $content_image : asset(GetSetting('site_logo'))}}"/>
    <meta property="og:url" content="{{@$content_url ? $content_url : url('/')}}" />
    <meta property="og:title" content="{{@$page_title ? $page_title : GetSetting('site_name')}}" />
    <meta property="og:description" content="{{@$description ? $description : GetSetting('site_description')}}" />




    <!-- Page Title -->
    <title> {{GetSetting('site_name')}} @if (!empty($page_title)) - {{$page_title}} @endif</title>
    @method('meta')


    @include('frontend.layouts.styles')
</head>
<body class="tm-container-1340px @if (GetSetting('site_direction') == 'RTL') rtl @endif has-side-panel side-panel-right">
    @include('frontend.layouts.preloader')
    @include('frontend.layouts.sidebar')
    @yield('content')
    @include('frontend.layouts.scripts')
</body>
</html>
