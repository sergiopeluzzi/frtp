<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>FRTP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="{{asset('site/assets/js/ie/html5shiv.js')}}"></script><![endif]-->
    <link rel="stylesheet" href="{{asset('site/assets/css/main.css')}}" />
    <!--[if lte IE 8]><link rel="stylesheet" href="{{asset('site/assets/css/ie8.css')}}" /><![endif]-->

</head>
<body class="homepage">
<div id="page-wrapper">

<div style="width: auto; background: #001f3f; color: #FFFFFF;">
        @yield('content')
</div>
    <!-- Header -->
    <div id="header-wrapper" class="wrapper">

        <div id="header">
            <!-- Logo -->


            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li class="current"><a href="/">Home</a></li>
                    <!--
                    <li>
                        <a href="#">EVENTOS</a>
                        <ul>
                            <li><a href="#">Lorem ipsum</a></li>
                            <li><a href="#">Magna veroeros</a></li>
                            <li><a href="#">Etiam nisl</a></li>
                            <li>
                                <a href="#">Sed consequat</a>
                                <ul>
                                    <li><a href="#">Lorem dolor</a></li>
                                    <li><a href="#">Amet consequat</a></li>
                                    <li><a href="#">Magna phasellus</a></li>
                                    <li><a href="#">Etiam nisl</a></li>
                                    <li><a href="#">Sed feugiat</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Nisl tempus</a></li>
                        </ul>
                    </li>
                    -->
                    <li><a href="#">ÁREA TÉCNICA</a></li>
                    <li><a href="#">FILIADOS</a></li>
                    <li><a href="#">EVENTOS</a></li>
                    <li><a href="#">MODALIDADES</a></li>
                    <li><a href="#footer">CONTATO</a></li>
                    <li><a href="#login-wrapper">LOGIN</a></li>

                </ul>
            </nav>

        </div>
    </div>

    <!-- Intro -->

    <!-- Footer -->
    <div id="footer-wrapper" class="wrapper">

        <div id="footer" class="container">

            <div class="row 150%">
                <div class="6u 12u(mobile)">

                    <!-- Contact Form -->
                    <section>
                        <form method="post" action="#">
                            <div class="row 50%">
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="name" id="contact-name" placeholder="Nome" />
                                </div>
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="email" id="contact-email" placeholder="Email" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="message" id="contact-message" placeholder="Mensagem" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="12u">
                                    <ul class="actions">
                                        <li><input type="submit" class="style1" value="Enviar" disabled/></li>
                                        <li><input type="reset" class="style2" value="Limpar" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>
                <div class="6u 12u(mobile)">

                    <!-- Contact -->
                    <section class="feature-list small">
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-home">Endereço</h3>
                                    <p>
                                        rua tal<br />
                                        n° 1234<br />
                                        bairro, cep 00000-000
                                    </p>
                                </section>
                            </div>
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-comment">Redes Sociais</h3>
                                    <p>
                                        <a href="#">face</a><br />
                                        <a href="#">insta</a><br />
                                        <a href="#">outros</a>
                                    </p>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-envelope">Email</h3>
                                    <p>
                                        <a href="#">email@frtp.org.br</a>
                                    </p>
                                </section>
                            </div>
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-phone">Telefone</h3>
                                    <p>
                                        (00) 0000-0000
                                    </p>
                                </section>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>

    </div>

    <div id="popupRecuperarSenha" class="popupRecupera">
        <p class="lead" align="center" style="font-size: x-large;">Recuperar Senha</p>
        {!! Form::open(['route' => 'login.montaEmailRecuperaSenha', 'method' => 'post', 'id' => 'loginRecupera']) !!}
        <div class="row">
            <legend class="form-group text-info">Informe o CPF cadastrado.</legend>
        </div>
        <div class="row">
            <div class="8u">
                {!! Form::label('IDUSU', 'CPF:') !!}
                {!! Form::text('IDUSU', '') !!}
            </div>
        </div>
        <br />
        <div class="pull-left">
            <button type='submit' class="button style3"></i> Recuperar</button>
            <a href="#" onclick="fecharRecuperarSenha()" class="button style3">Sair</a>
        </div>
        {!! Form::close() !!}
    </div>

    <div id="popupFazerCadastro" class="popupCadastro">
        <p class="lead" align="center" style="font-size: x-large;">Formulário de Cadastro de Usuários</p>
        {!! Form::open(['route' => 'login.store', 'method' => 'post', 'id' => 'loginCadastro']) !!}
        <div class="row">
            <div class="12u">
                {!! Form::label('NOME', 'Nome:') !!}
                {!! Form::text('NOME', '', ['onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="6u">
                {!! Form::label('IDUSER', 'CPF:') !!}
                {!! Form::text('IDUSER', '') !!}
            </div>
            <div class="6u">
                {!! Form::label('NOM_USER', 'Usuário:') !!}
                {!! Form::text('NOM_USER', '', ['onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="6u">
                {!! Form::label('SENHA', 'Senha:') !!}
                {!! Form::password('SENHA', '') !!}
            </div>
            <div class="6u">
                {!! Form::label('SENHA2', 'Senha:') !!}
                {!! Form::password('SENHA2', '') !!}
            </div>
        </div>
        <br />
        <div class="pull-left">
            <button type='submit' class="button style3"></i> Salvar</button>
            <a href="#" onclick="fecharFazerCadastro();" class="button style3">Sair</a>
        </div>

        {!! Form::close() !!}

    </div>
    <!--/.center-->
    <div id="login-wrapper" class="wrapper style1">
        <div id="login" class="container">
            @include('toast::messages-jquery')
            <div class="title">EFETUAR LOGIN</div>

            {!! Form::open(['route' => 'login.valida', 'method' => 'post']) !!}
            <div class="row">
                <div class="4u">
                    <h3 class="text-info">Usuário:</h3>
                    {!! Form::text('NOM_USER', '', ['onChange' => 'this.value = this.value.toUpperCase()']) !!}
                </div>
                <div class="4u">
                    <h3 class="text-info">Senha:</h3>
                    {!! Form::password('SENHA','') !!}
                </div>
            </div>
            <br />
            <div>
                <div class="pull-left">
                    <button type='submit' class="button style3"></i> Entrar</button>
                    <a href="#" onclick="abrirRecuperarSenha()" class="button style3">Recuperar Senha</a>
                    <a href="#" onclick="abrirFazerCadastro()" class="button style3">Fazer Cadastro</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="{{asset('site/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('site/assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('site/assets/js/skel.min.js')}}"></script>
<script src="{{asset('site/assets/js/skel-viewport.min.js')}}"></script>
<script src="{{asset('site/assets/js/util.js')}}"></script>
<!--[if lte IE 8]><script src="{{asset('site/assets/js/ie/respond.min.js')}}"></script><![endif]-->
<script src="{{asset('site/assets/js/main.js')}}"></script>



<script src="{{asset('interno/dist/js/maskValid/jquery-1.5.2.min.js')}}" type="text/javascript"></script>
<!-- Plugin Validation -->
<script src="{{asset('interno/dist/js/maskValid/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/messages_ptbr.js')}}" type="text/javascript"></script>
<!-- Plugin Masked Input -->
<script src="{{asset('interno/dist/js/maskValid/jquery.maskedinput-1.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('interno/dist/js/maskValid/jquery.price_format.1.4.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('interno/dist/css/estilo.css')}}" />


<script type="text/javascript">
    function fecharFazerCadastro(){
        document.getElementById('popupFazerCadastro').style.display = 'none';
    }

    function fecharRecuperarSenha(){
        document.getElementById('popupRecuperarSenha').style.display = 'none';
    }

    function abrirRecuperarSenha(){
        document.getElementById('popupRecuperarSenha').style.display = 'block';
        //setTimeout ("fechar()", 3000);
    }

    function abrirFazerCadastro(){
        document.getElementById('popupFazerCadastro').style.display = 'block';
        //setTimeout ("fechar()", 3000);
    }
</script>

<!-- Script que vai adicionar as máscaras nos campos -->
<script type="text/javascript">
    jQuery(function($){
        //defina as máscaras de seus campos, o 9 indica um caracter numérico qualquer
        $("#IDUSER").mask("999.999.999-99");
        $("#IDUSU").mask("999.999.999-99");
    });
</script>

<script type="text/javascript">
    $(document).ready( function() {
        //Inicio das regras de validação
        $("#loginCadastro").validate({
            // Define as regras
            rules:{
                NOME:{
                    required: true
                },
                IDUSER:{
                    required: true
                },
                NOM_USER:{
                    required: true
                },
                SENHA:{
                    required: true
                },
                SENHA2:{
                    required: true
                }
            },
        });
    });

    $(document).ready( function() {
        //Inicio das regras de validação
        $("#loginRecupera").validate({
            // Define as regras
            rules:{
                NOME:{
                    required: true
                },
                IDUSER:{
                    required: true
                },
                NOM_USER:{
                    required: true
                },
                SENHA:{
                    required: true
                },
                SENHA2:{
                    required: true
                }
            },
        });
    });

    $(document).ready( function() {
        //Inicio das regras de validação
        $("#loginAlteraSenha").validate({
            // Define as regras
            rules:{
                NOME:{
                    required: true
                },
                IDUSER:{
                    required: true
                },
                NOM_USER:{
                    required: true
                },
                SENHA:{
                    required: true
                },
                SENHA2:{
                    required: true
                }
            },
        });
    });

</script>

<script>
    var password = document.getElementById("SENHA"), confirm_password = document.getElementById("SENHA2");
    function validatePassword(){
        if(password.value != confirm_password.value)
        {

            confirm_password.setCustomValidity("As Senhas devem ser Iguais!");
        }
        else
        {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>