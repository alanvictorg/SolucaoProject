<!DOCTYPE html>
<html >
@include('layouts.head')
<body>
 <div class="main-wrapper">
  <div class="app" id="app">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    {{-- contents must contains sections tags --}}
    @yield('content')

    @include('layouts.footer')

    @include('layouts._modal_media')
    @include('layouts._modal_confirm')

    


    
    @include('layouts.scripts')
    @yield('page_scripts')
    
    @include('errors._check')
     </body>
  </html>