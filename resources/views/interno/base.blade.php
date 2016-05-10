<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FRTP - Acesso Restrito</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('interno/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('interno/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('interno/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('interno/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('interno/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('interno/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('interno/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('interno/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('interno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>FRTP</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>FRTP</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header" style="color:#FFFFFF";>Navegação</li>


                @if( isset($associado) )
                    <li><a href="{{ route('interno.associados.edit', ['IDUSER' => session('IDUSER')]) }}"><i class="fa fa-book"></i> <span>Meus Dados</span></a></li>
                    <li><a href="{{ route('interno.eventos.index') }}"><i class="fa fa-book"></i> <span>Eventos</span></a></li>
                    <li><a href="{{ route('interno.financeiro.index') }}"><i class="fa fa-book"></i> <span>Financeiro</span></a></li>
                @else
                    <li><a href="{{ route('interno.associados.create') }}"><i class="fa fa-book"></i> <span>Filie-se</span></a></li>
                @endif

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Documentos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Doc 1</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Doc 2</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Doc 3</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Doc 4</a></li>
                    </ul>
                </li>
                <li><a href="/"><i class="fa fa-book"></i> <span>Sair</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            @yield('conteudo')

        </section><!-- /.content -->


    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-2016 &nbsp; <a href="#">SHIFT - Consultoria em Tecnologia</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div><!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('interno/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('interno/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('interno/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('interno/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('interno/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('interno/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('interno/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('interno/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('interno/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('interno/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('interno/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('interno/plugins/fastclick/fastclick.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('interno/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('interno/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('interno/dist/js/demo.js')}}"></script>


<!-- SELECT2
<!-- jQuery 2.1.4
<script src="{{asset('interno/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Select2
<link rel="stylesheet" href="{{asset('interno/plugins/select2/select2.min.css')}}">
<!-- Select2
<script src="{{asset('interno/plugins/select2/select2.full.min.js')}}"></script>
 -->



<script src="{{asset('interno/dist/js/maskValid/jquery-1.5.2.min.js')}}" type="text/javascript"></script>
<!-- Plugin Validation -->
<script src="{{asset('interno/dist/js/maskValid/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/messages_ptbr.js')}}" type="text/javascript"></script>
<!-- Plugin Masked Input -->
<script src="{{asset('interno/dist/js/maskValid/jquery.maskedinput-1.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/jquery.price_format.1.4.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('interno/dist/css/estilo.css')}}" />





<!-- SELECT 2
<script type="text/javascript">
    $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
-->

<!-- Switch
<script type="text/javascript">
    $(function(){
        $("[name='my-checkbox']").bootstrapSwitch();
    });
</script>
-->

<!-- Script que vai adicionar as máscaras nos campos -->
<script type="text/javascript">
    jQuery(function($){
        //defina as máscaras de seus campos, o 9 indica um caracter numérico qualquer
        $("#CPF").mask("999.999.999-99");
        $("#CEP").mask("99999-999");
        $("#FONE").mask("(99)9999-9999");
        $("#CELULAR").mask("(99)9999-9999");
        $("#CEP_COM").mask("99999-999");
        $("#FONE_COM").mask("(99)9999-9999");
        $("#FAX_COM").mask("(99)9999-9999");
    });
</script>

<script type="text/javascript">
    $(document).ready( function() {
        //Inicio das regras de validação
        $("#associados").validate({
            // Define as regras
            rules:{
                SEXO:{
                    required: true
                },
                ECIVIL:{
                    required: true
                },
                CPF:{
                    required: true
                },
                RG:{
                    required: true
                },
                NASCTO:{
                    required: true
                },
                ENDERECO:{
                    required: true
                },
                BAIRRO:{
                    required: true
                },
                CIDADE:{
                    required: true
                },
                EMAIL:{
                    required: true
                },
                PAI:{
                    required: true
                },
                MAE:{
                    required: true
                }

            },
        });
    });

</script>

<script>
    function participaModalidade(nomeElemento,idEvento)
    {


        var valor     = document.getElementById('valor.'+nomeElemento).value;
        var qtdPistas = document.getElementById('qtdPistas.'+nomeElemento).value;
        var total = 0;
        var totalModalidade = 0;
        var final = 0;

        var totalModalidadeR = valor * qtdPistas;

        total           += document.getElementById('total.'+idEvento).value;

        if(document.getElementById('check.'+nomeElemento).checked == true)
        {
            if( document.getElementById('qtdPistas.'+nomeElemento).value == null || document.getElementById('qtdPistas.'+nomeElemento).value == 0)
            {

                document.getElementById('qtdPistas.'+nomeElemento).focus();



                /* document.getElementById('qtdPistas.'+nomeElemento).value = 1;

                qtdPistas = document.getElementById('qtdPistas.'+nomeElemento).value;

                totalModalidade = valor * qtdPistas;

                document.getElementById('totalModalidade.'+nomeElemento).value = parseFloat(totalModalidade).toFixed(2);

                final = (parseFloat(total) + parseFloat(totalModalidade)).toFixed(2);

                document.getElementById('total.'+idEvento).value = final; */

            }
            else
            {
                totalModalidade = valor * qtdPistas;

                document.getElementById('totalModalidade.'+nomeElemento).value = parseFloat(totalModalidade).toFixed(2);

                final = (parseFloat(total) + parseFloat(totalModalidade)).toFixed(2);

                document.getElementById('total.'+idEvento).value = final;
            }
        }
        else
        {
            if(document.getElementById('qtdPistas.'+nomeElemento).value == 1)
            {
                var tirar = document.getElementById('totalModalidade.'+nomeElemento).value;

                document.getElementById('totalModalidade.'+nomeElemento).value = null;

                final = (parseFloat(total) - parseFloat(tirar)).toFixed(2);

                document.getElementById('total.'+idEvento).value = final;

            }
            else
            {
                if(document.getElementById('qtdPistas.'+nomeElemento).value > 0)
                {
                    var tirar = document.getElementById('totalModalidade.'+nomeElemento).value;

                    document.getElementById('totalModalidade.'+nomeElemento).value = null;
                    document.getElementById('qtdPistas.'+nomeElemento).value = null;

                    final = (parseFloat(total) - parseFloat(tirar)).toFixed(2);

                    document.getElementById('total.'+idEvento).value = final;
                }
            }
        }

    };

    function somaModalidade(nomeElemento,idEvento)
    {
        var valor     = document.getElementById('valor.'+nomeElemento).value;
        var qtdPistas = document.getElementById('qtdPistas.'+nomeElemento).value;
        var total = 0;
        var totalModalidade = 0;
        var final = 0;

        total           = document.getElementById('total.'+idEvento).value;

        if(qtdPistas > 0)
        {
            totalModalidade = valor * qtdPistas;

            document.getElementById('totalModalidade.'+nomeElemento).value = parseFloat(totalModalidade).toFixed(2);

            final = (parseFloat(total) + parseFloat(totalModalidade)).toFixed(2);

            document.getElementById('total.'+idEvento).value = final;

        }
        else
        {
            document.getElementById('check.'+nomeElemento).checked = false;

            document.getElementById('totalModalidade.'+nomeElemento).value = '';
        }

    }


    function verificavazio(nomeElemento,idEvento)
    {
        var qtdPistas = document.getElementById('qtdPistas.'+nomeElemento).value;

        if(qtdPistas > 0)
        {

        }
        else
        {
            document.getElementById('check.'+nomeElemento).checked = false;
            document.getElementById('totalModalidade.'+nomeElemento).value = '';
        }
    }

</script>

</body>

</html>
