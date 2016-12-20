<!-- jQuery 2.2.3 -->
{!! Html::script('assets/plugins/jQuery/jquery-3.1.1.min.js') !!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script('assets/plugins/jQueryUI/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}
{!! Html::script('assets/dist/js/app.min.js') !!}

@yield('script')