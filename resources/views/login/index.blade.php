@extends('app')

@section('content')

    <section id="associados_create">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2 class="text-info">Acesso Restrito</h2>
                </div>
                    @include('toast::messages-jquery')
                {!! Form::open(['route' => 'login.valida', 'method' => 'post']) !!}

                <!--/.center-->
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
                        <a href="{{ route('login.indexRecuperaSenha') }}" class="button style3">Recuperar Senha</a>
                        <a href="{{ route('login.create') }}" class="button style3"> Fazer Cadastro</a>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!--/#associados_create-->

@stop