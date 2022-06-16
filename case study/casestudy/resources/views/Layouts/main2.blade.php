<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carshop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('website/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('website/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('website/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
  </head>
  <body>
     @include('Layouts.includes.website.header')
     @include('Layouts.includes.website.sidebar')
     @yield('title')
     @include('Layouts.includes.website.footer')
 