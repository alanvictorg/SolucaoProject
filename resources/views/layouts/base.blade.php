<!DOCTYPE html>
<html>
@include('layouts.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.menu')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    @include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">

    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('layouts.script')
</body>
</html>
