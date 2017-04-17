<!DOCTYPE html>
<html >
@include('layouts.head')
<body>
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('page_scripts')
    @include('errors._check')
     </body>
  </html>