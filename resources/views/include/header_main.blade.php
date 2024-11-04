<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Awaiken">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta name="apple-mobile-web-app-title" content="InvestGold" />
<meta name="application-name" content="InvestGold" />
<meta name="theme-color" content="#ffffff" />

<meta name="google-site-verification" content="sVutg7cMWg_4nb02FzojmNc508EGJbzan87dKALvnHs" />
  <!-- Page Title -->
  <title>@yield('title', 'InvestGold: The Leader in Bullion & Precious Metals Investments')</title>
  <!-- Favicon Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <!-- Google Fonts Css-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
  <!-- Bootstrap Css -->
  <link href="{{ asset('assets/storage/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
  <!-- SlickNav Css -->
  <link href="{{ asset('assets/storage/css/slicknav.min.css') }}" rel="stylesheet">
  <!-- Swiper Css -->
  <link rel="stylesheet" href="{{ asset('assets/storage/css/swiper-bundle.min.css') }}">
  <!-- Font Awesome Icon Css-->
  <link href="{{ asset('assets/storage/css/all.css') }}" rel="stylesheet" media="screen">
  <!-- Animated Css -->
  <link href="{{ asset('assets/storage/css/animate.css') }}" rel="stylesheet">
  <!-- Magnific Popup Core Css File -->
  <link rel="stylesheet" href="{{ asset('assets/storage/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Mouse Cursor Css File -->
  <!--<link rel="stylesheet" href="css/mousecursor.css">-->
  <!-- Main Custom Css -->
  <link href="{{ asset('assets/storage/css/custom.css') }}" rel="stylesheet" media="screen">
  <link href="{{ asset('assets/storage/css/newstyle.css') }}" rel="stylesheet" media="screen">
  <link href="{{ asset('assets/storage/css/popup_style.css') }}" rel="stylesheet" media="screen">
</head>
<style>
.popup {
  background-color: rgba(0, 0, 0, 0) !important;
}
</style>	
@include('include/header')

@yield('content')

@include('include/footer')