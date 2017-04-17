<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }} - </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('assets/global/css/bootstrap.min.css') !!}
    {!! Html::style('assets/global/css/custom.css') !!}

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <span class="logo-lg text-blue-base"><b class="text-orange">SOLUÇÃO</b>PROJECT</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-left" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<div class="container-fluid">
    <div class="col-md-12">
        <iframe src="http://www.solucaoproject.com.br" frameborder="0" class="framelogin"></iframe>
    </div>
</div>
<!-- /.content-wrapper -->
<footer class="container text-center">
    <strong>Copyright &copy; 2016-2016 <a href="http://www.solucaoproject.com.br">Solução Project</a>.</strong> Todos os direitos reservados.
    Desenvolvido por <a href="http://includetecnologia.com.br"> Include Tecnologia</a>
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
{!! Html::script('js/jquery-3.1.1.js') !!}

    <!-- Bootstrap 3.3.6 -->
{!! Html::script('global/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
</body>
</html>
