<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FRTP | Federação Rondoniense de Tiro Prático</title>
    <link href="{{asset('site/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('site/css/main.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('site/js/html5shiv.js')}}"></script>
    <script src="{{asset('site/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('site/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('site/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('site/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('site/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('site/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
<header>
    <div class="container">
        <div class="navbar">
            <ul class="nav navbar-nav pull-right">
                <li><a class="btn btn-lg" href="#"><i class="glyphicon glyphicon-lock"></i> Acesso Restrito</a></li>
                <li><a class="btn btn-lg" href="#"><i class="glyphicon glyphicon-hand-down"></i> Filie-se</a></li>
            </ul>
        </div>

        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header navbar-collapse">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 align="center" class="navbar-collapse"><a href="{{ route('index') }}">FRTP</a></h1>
                <!--<a class="navbar-brand" href="/"></a>-->
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><i class="icon-home"></i></a></li>
                    <li><a href="#">A LIGA</a></li>
                    <li><a href="{{ route('associados.index') }}">FILIADOS</a></li>
                    <li><a href="#">MODALIDADES</a></li>
                    <li><a href="#">ÁREA TÉCNICA</a></li>
                    <li><a href="#">COMPETIÇÕES</a></li>
                    <li><a href="#">CONTATO</a></li>
                </ul>

            </div>

        </div>
    </div>
</header>
<!--/#header-->

@yield('content')

<footer id="footer" style="background-color: #666666">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2>A liga</h2>
                <ul>
                    <li><a href="#">Histórico</a></li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h2>Filiados</h2>
                <ul>
                    <li><a href="#">Histórico</a></li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h2>Modalidades</h2>
                <ul>
                    <li><a href="#">Histórico</a></li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h2>Competições</h2>
                <ul>
                    <li><a href="#">Histórico</a></li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                    <li>Estatuto</li>
                    <li>Diretoria Executiva</li>
                    <li>Administração</li>
                    <li>Fiscalização</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<script src="{{asset('site/js/jquery.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('site/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
</body>
</html>