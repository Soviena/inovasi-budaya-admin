<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('public/')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Admin Sucofindo</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('public/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('public/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('public/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('public/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('public/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('public/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('public/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              @error('email')
              <div class="alert alert-danger alert-dismissible" role="alert">
                Salah Email atau password, coba lagi..
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 827 367" width="881" height="100">
                  <title>Logo-Sucofindo-ai</title>
                  <style>
                    .s0 { fill: #0767aa } 
                    .s1 { fill: #0086c4 } 
                    .s2 { fill: #009ad8 } 
                  </style>
                  <g id="Layer 1">
                    <g id="&lt;Group&gt;">
                      <g id="&lt;Group&gt;">
                        <path id="&lt;Path&gt;" class="s0" d="m112.7 276.6c-2.8 1.4-5.6 0.7-8.3 0.7-23.8 0-47.5-0.3-71.2-0.1-5.8 0-9-1.8-11.7-7-12.3-23.2-19.2-47.9-21.3-74.1-0.6-7.6-0.5-7.8 7.5-7.8q38.9 0 77.8 0c7.5 0 7.5 0.2 8.1 7.7 1.9 24.1 7.4 47.4 16.1 70 1.3 3.3 3.6 6.6 3 10.6z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m529.5 277.1c-1-3.1 1-5.5 2-8 9.4-23.6 15-48.1 16.3-73.6 0.3-7.2 0.4-7.4 7.4-7.4q39.3-0.1 78.6 0c7.5 0 7.8 0.3 7.3 7.2-2 27.7-9.4 53.9-23.1 78.2-1.7 3-3.6 4.6-7.3 4.6-26.2-0.2-52.4-0.2-78.6-0.4-0.9 0-1.8-0.4-2.6-0.6z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m715 277c-1.1-3.2 0.9-5.6 1.9-8 9.6-23.7 14.7-48.3 16.4-73.7 0.4-6.9 0.4-7.1 6.7-7.1q39.8-0.1 79.6 0c6.7 0 7.3 0.7 6.9 6.8-2 26.8-9 52.1-21.6 75.9-2.9 5.5-6.3 7.4-12.4 7.3-22.2-0.4-44.4-0.1-66.5-0.2-3.7 0-7.5 0.6-11-1z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m254.1 278c2.4-6.4 4.4-11.3 6.1-16.2 7.6-21.3 12.6-43.1 13.6-65.7 0.3-7.2 0.4-7.4 7.3-7.4q39.8-0.1 79.6 0c6.7 0 7 0.3 6.5 6.9-2.2 27.5-9.6 53.3-22.9 77.5-1.9 3.3-4 5-8.1 5-26.8-0.2-53.6-0.1-82.1-0.1z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m110.6 95.9c-6.3 17.6-11.6 33.2-14.2 49.6-1.4 9.2-3 18.5-2.9 27.9 0 4.1-1.6 5.4-5.6 5.4-27.4-0.1-54.9-0.2-82.4 0-4.8 0-5.8-2.1-5.5-6.3 2.1-25.1 8.2-49.1 19.7-71.7 1.6-3 3.3-4.9 7.1-4.9 27.4 0.1 54.8 0 83.8 0z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m780 178.8c-13.7 0-27.5-0.1-41.2 0-3.8 0.1-5.4-1.1-5.7-5.3-1.3-22.8-6-45-14.3-66.4q-0.9-2.2-1.5-4.5c-1.5-5-1-5.7 4.5-6.1 0.9-0.1 1.9-0.1 2.8 0 24.3 2.2 48.7 0.8 73 0.9 5.9 0.1 8.8 2.2 11.3 7.4 10 21.5 15.7 44 17.6 67.6 0.4 5.6-0.1 6.3-6.2 6.4-13.4 0.1-26.9 0-40.3 0z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m530.6 98.1c3.4-2 6.3-1.9 9-1.6 23.7 2.1 47.5 0.9 71.2 0.8 7.1 0 10.6 2.5 13.4 8.7 9.4 20.7 14.9 42.4 16.9 65 0.6 7.2 0.2 7.7-6.6 7.7-26.9 0.1-53.8 0-80.7 0.1-3.4 0-6-0.3-6.1-4.9-0.8-24.9-7.1-48.7-15.9-71.9-0.5-1.1-0.7-2.3-1.2-3.9z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m257.3 98.2c2.1-1.8 4.7-1 7.1-1 25 0.1 50 0.3 75 0.2 4.6 0 7.2 1.4 9.3 5.6 10.7 21.6 16.5 44.5 18.4 68.3 0.6 7.2 0.4 7.4-6.8 7.4-26.6 0.1-53.2 0-79.7 0.1-4.4 0-6.8-0.6-7-6-1-23.6-6.6-46.3-14.8-68.3-0.8-2-2.3-3.9-1.5-6.3z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m188.6 233.2c0-12.5-0.1-25 0-37.5 0-7.2 0.1-7.3 7.1-7.4q30.4-0.1 60.8 0c8 0.1 8.2 0.2 7.7 8.6-1.1 20.4-5.4 40.1-12.2 59.3-1.9 5.6-4.4 11-6.4 16.6-1.4 3.7-3.7 5.2-7.7 5.1q-22-0.3-44 0c-4.2 0.1-5.4-1.5-5.4-5.4 0.2-13.1 0.1-26.2 0.1-39.3z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m177.6 277.8c-16.4 0-32.9 0-49.5 0.1-3.4 0-5-1.9-6.2-4.7-10.7-24.9-17.5-50.7-18.8-77.9-0.4-6.7-0.1-6.9 6.5-7 20.9 0 41.8 0.1 62.8 0 4.1-0.1 6.3 0.7 6.3 5.5-0.2 26.9-0.1 53.8-0.2 80.7 0 0.9-0.5 1.8-0.9 3.3z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m453.3 233.2c0 12.1 0.1 24.3 0 36.5-0.1 7.9-0.1 8.1-7.5 8.1-13.7 0.1-27.4-0.2-41.2-0.2-3.9 0-6.2-1.3-7.8-5-10.8-24.5-17.7-49.9-19.6-76.6-0.6-7.7-0.3-7.9 7.3-7.9q30.4-0.1 60.8 0c7.9 0 8 0.1 8 8.6 0 12.1 0 24.3 0 36.5z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m462.9 233.1c0-12.5-0.1-24.9 0-37.4 0-7.4 0.1-7.6 6.9-7.6q30.9-0.1 61.8 0c6.8 0.1 7.1 0.3 6.8 6.7-1.3 27.1-8 52.9-18.6 77.7-1.5 3.5-3.4 5.5-7.6 5.5q-21.5-0.4-43-0.1c-4.9 0.1-6.5-1.6-6.4-6.5 0.2-12.7 0.1-25.5 0.1-38.3z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m340.6 88c-9 0-15.8 0-22.5 0-20-0.1-40-0.2-60-0.1-4.2 0-6.9-1.1-8.8-5.2-13.4-28-30.9-53.4-50.8-77.2-0.9-1.2-2.3-2.2-1.8-5 61.2 5.8 108.5 34.4 143.9 87.5z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m686.1 188.1c10.3 0 20.6 0 30.9 0.1 6.8 0 7.2 0.3 6.8 6.6-1.6 27-8 53-18.7 77.8-1.5 3.5-3.5 5.4-7.7 5.4-14.3-0.3-28.7-0.3-43-0.1-4.4 0-6.1-1.5-6-6 0.1-25.9 0.1-51.8 0-77.7-0.1-5.2 2.2-6.2 6.8-6.1 10.3 0.2 20.6 0 30.9 0z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m797.5 87.4c-0.9 0.3-1.7 0.6-2.6 0.6-25.6 0-51.2-0.2-76.9-0.2-4.4 0-7.5-0.8-9.7-5.3-13.4-28.5-31.1-54.2-51.4-78.1-0.5-0.7-0.7-1.6-1.1-2.5 54.9-1 121.3 42.3 141.7 85.5z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m470 1.1c58.4 3.4 119.9 40.5 142.4 85.4-0.4 1.7-1.7 1.5-2.9 1.5-25.6-0.1-51.2-0.3-76.8-0.3-4.3 0-7.5-0.7-9.6-5.3-13.5-28.3-31.2-53.9-51.3-77.9-0.5-0.7-0.8-1.6-1.8-3.4z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m29.4 87.1c4.2-12.4 25.5-36.3 44.1-50.1 28.9-21.7 63-34.3 96-35.7 1.4 2.8-1.2 3.9-2.4 5.4-19.4 23.4-36.9 48-50 75.6-1.3 2.6-2.4 4.9-6 4.9-27.1-0.1-54.2-0.1-81.7-0.1z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m453.3 138.4c0 11.3-0.2 22.5 0.1 33.8 0.1 4.6-1.2 6.7-6.3 6.7-21.2-0.3-42.5-0.1-63.7-0.2-6.2 0-6.8-0.6-6.5-6.2 1.4-24.6 7-48.1 16.1-70.9 1.5-3.8 3.6-5.5 7.6-5.4q23.5 0.2 46.9 0.3c4.3 0 6 1.9 5.9 6.3-0.3 11.9-0.1 23.8-0.1 35.6z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m188.7 138.3c0-11.8 0.1-23.7-0.1-35.6 0-3.8 1-5.7 5.3-5.6 15.6 0.2 31.2 0.1 46.8 0 3.3 0 5.3 1 6.5 4.1 8.8 22.8 15.2 46.3 16.8 70.8 0.4 6.5 0.2 6.7-6.5 6.7q-31 0.1-61.9 0c-6.7 0-6.8-0.2-6.9-6.6-0.1-11.3 0-22.5 0-33.8z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m463 137.5c0-11.2 0.2-22.4 0-33.7-0.1-4.5 0.8-6.8 6.1-6.7 14.9 0.3 29.9 0.2 44.9 0.1 4.1-0.1 6.1 1.6 7.6 5.3q13.5 33.2 16.4 68.9c0.6 6.8 0.4 7.1-6.1 7.1-20.9 0.2-41.8-0.1-62.7 0.2-5 0-6.4-1.8-6.3-6.5 0.3-11.6 0.1-23.1 0.1-34.7z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m178.5 138.9c0 11 0.1 21.9 0 32.8 0 6.8-0.1 7-6.5 7q-31.4 0.1-62.8 0c-6.2 0-6.4-0.2-5.9-6.4 1.7-24.5 7.9-47.9 16.7-70.8 1.4-3.5 3.6-4.4 7.1-4.4 15 0.1 30 0.2 45 0 4.7-0.1 6.7 1.2 6.5 6.2-0.3 11.9-0.1 23.8-0.1 35.6z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m648.4 137.6c0-11.2 0.1-22.5 0-33.7-0.1-4.4 0.7-6.8 6.1-6.7 14.9 0.3 29.9 0.2 44.9 0 4.2-0.1 6.1 1.8 7.6 5.3 9.1 22.8 14.5 46.4 16.6 70.7 0.3 4.3-1.4 5.5-5.3 5.4-21.5-0.1-43-0.1-64.6 0.1-4.1 0-5.4-1.6-5.3-5.6 0.1-11.8 0-23.7 0-35.5z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m172.7 367.3c-60.3-5.6-106-32-140.2-79 1.9-3.1 4.3-1.8 6.3-1.8 24 0.1 48.1 0.5 72.1 0.2 5.8 0 8.9 1.6 11.5 6.8 12.1 23.8 27.3 45.5 44.2 66 1.6 1.9 3 3.9 6.1 7.8z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m195.2 366.9c6.2-7.7 11-13.4 15.6-19.3 13.4-16.9 25.4-34.8 35.3-54 1.9-3.8 3.7-6.6 8.9-6.5 25.9 0.2 51.8 0.1 77.9 0.1-2.2 9.4-19.4 28.6-38.1 42.7-28.9 21.7-61.1 34.4-99.6 37z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m471.1 365.6c0.4-2.7 2.6-4.1 4.1-5.9 17.4-20.6 32.9-42.5 45.2-66.5 2-3.9 4.1-6.3 9.1-6.2 25.6 0.2 51.2 0.1 76.9 0.1-7.2 33.8-92.4 82.8-135.3 78.5z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m794.1 288.3c-35.1 47.4-80.1 73.1-137 78.7-1.1-3.7 1.3-4.8 2.6-6.3 17.6-20.8 33.4-42.8 45.7-67.1 2.5-4.9 5.4-6.7 10.9-6.6 24 0.4 48 0.4 72 0.6 1.2 0 2.4 0.3 5.8 0.7z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m445.1 1.9c-2.5 3.1-4.3 5.5-6.3 7.8-18.2 21.8-34.4 45.1-46.7 70.8-2.2 4.6-4.6 6.7-9.9 6.4-8.4-0.4-16.8-0.3-25.2 0-4.7 0.2-7.5-1.8-9.8-5.7-4.5-7.8-9.9-15.2-16-21.8-3.4-3.6-3-5.8 0.5-9.1 25.9-23.7 55.8-39.7 90.3-46.5 7.2-1.4 14.4-3 23.1-1.9z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m445 366.9c-44.1-3.4-81.3-20.3-113.3-49.5-3.5-3.2-3.8-5.4-0.5-9.1 4.5-5.1 8.4-10.8 12.4-16.4 2.2-2.9 4.6-5 8.5-5 12.1 0.1 24.3 0.1 36.5 0 3.3-0.1 5.1 1.5 6.5 4.2 13.3 26.4 30.2 50.3 49 72.9 0.3 0.4 0.3 1.1 0.9 2.9z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m453.3 10.8q0 35.9 0 71.8c0 2.8-0.8 5-4 5-16.1-0.2-32.3-0.4-49.8-0.5 14-29.4 31.7-54.1 51.7-77.3q1.1 0.5 2.1 1z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m240.9 87.5c-9.2 0-16.9 0-24.6 0-6.9 0-13.7 0.1-20.6 0-7-0.1-7.1-0.1-7.1-7.4-0.1-17.5 0-35 0-52.5q0-8.3 0-16.6c21.2 22.7 38.5 47.4 52.3 76.5z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m126.3 87.5c14-29 31-53.7 50.6-76.8 2.8 1.7 1.7 4.2 1.7 6.1q0.1 31.3 0 62.7c0 7.9-0.1 8-8.3 8-14 0.1-28 0-44 0z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m649.8 10.9c19.7 23.2 36.6 47.9 49.6 74.9-2.1 2.7-4.4 1.8-6.4 1.9-12.8 0-25.6-0.1-38.4 0-3.8 0-6.8-0.3-6.7-5.3 0.1-23.1 0.1-46.1 0.2-69.2 0-0.5 0.7-1 1.7-2.3z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m515.1 87.6c-17.2 0-32.4 0-47.6 0-3.8 0-4.7-2.1-4.7-5.4 0.2-5.3 0.1-10.6 0.1-15.9 0-15.6-0.1-31.2 0-46.8 0-2.7-0.8-5.5 1.4-9 19.7 23.5 36.7 48 50.8 77.1z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m403.5 286.6c8.7 0 16.1 0 23.5 0 7.2 0.1 14.4 0.4 21.6 0.4 3 0.1 4.7 1.1 4.7 4.3 0 21.8 0 43.5-0.9 65.7-19.4-20.9-35.3-43.8-48.9-70.4z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m189.9 358.5c-1.7-8.5-1.8-62.4-0.3-71.1 15.8 0 31.5 0 49 0-13.4 26.3-30.2 48.8-48.7 71.1z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m648.2 357.5c0-8.7 0-15.8 0-22.9 0-13.5-0.1-26.9 0.1-40.3 0-6.8 0.2-7 6.5-7 13.6-0.1 27.2 0 41 0-2 12.3-32.1 56.9-47.6 70.2z"/>
                        <path id="&lt;Path&gt;" class="s0" d="m178.2 359c-19.2-23-34.5-45.8-48.3-71 4.8-1.4 8.5-0.9 12.1-0.9 10.3-0.1 20.6-0.1 30.9-0.1 2.5 0 5.4-0.3 5.4 3.4 0.4 22.1 1.5 44.2-0.1 68.6z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m463.8 356.6c-1.7-1.5-0.9-3.5-0.9-5.2q-0.1-28.1 0-56.1c0-8 0.1-8 8.3-8.1 13.1 0 26.1 0 39.3 0-1.3 11.5-33.4 59-46.7 69.4z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m639.4 11.1c0 24 0 47.4 0.1 70.7 0 4.5-1.6 5.8-6 6-6.8 0.5-11.5-1-15-7.8-3.6-6.8-9-12.7-13.6-18.9-1.5-2-3.5-3.6-1.4-6.5 10.6-14.6 20.4-29.9 33.1-42.8 0.4-0.4 1.1-0.3 2.8-0.7z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m638.1 358.2c-12.9-14.4-23.6-29.3-33.5-44.9-1.6-2.4-1.7-4.3 0.4-6.6 4.7-5 8.8-10.5 12.4-16.4 1.2-2 2.9-2.8 5.3-3.1 16.1-1.8 16.7-1.3 16.7 14.7 0 16 0.1 31.9 0 47.8 0 2.4 0.7 4.9-1.3 8.5z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m595.9 50.1c-6.6-5.8-12.1-10.9-17.9-15.6-5.5-4.4-11.4-8.5-18.1-13.5 23-11.9 46.5-18.1 73.7-20.1-14.6 16.5-26.5 32.3-37.7 49.2z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m560.2 346.3c12.7-8.7 24.4-17.5 35.3-28.9 11.6 16.7 23 32.9 36.5 47.5-12 3.8-51.5-6.3-71.8-18.6z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m352.8 277.2c9.1-15.6 13.7-30.9 19.3-48.1 4.5 17.2 9.6 32 15.6 47.5-11.6 1.1-22.2 0.3-34.9 0.6z"/>
                        <path id="&lt;Path&gt;" class="s1" d="m384.2 97.3c-4.6 12.7-8.7 24.4-12.2 38.7-5.3-13.7-8.8-26.1-15.5-38.3 9.4-2 17.9-1.5 27.7-0.4z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m626.3 276.5c3.9-8.6 7.9-17.2 11.9-25.9q0.6 0.1 1.2 0.1c0 7.3-0.1 14.6 0.1 21.9 0.1 4.2-1.7 5.7-5.6 5.3-2.3-0.3-4.9 0.7-7.6-1.4z"/>
                        <path id="&lt;Path&gt;" class="s2" d="m638.2 117.4c-2.9-6.3-5.7-12.7-8.7-19.1 9.8-1.7 9.8-1.7 9.9 6.3 0.1 4.1 0 8.1 0 12.2q-0.6 0.3-1.2 0.6z"/>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Admin Panel Aplikasi Budaya</h4>
              <p class="mb-4">Silahkan Sign in untuk melanjutkan</p>

              <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    value="{{old('email')}}"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{ route('password.request') }}">
                      <small>Lupa Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember-me" />
                    <label class="form-check-label" for="remember-me">Ingat Saya</label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
  
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('public/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('public/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('public/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('public/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
