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
                    <div class="form-group col-md-12">
                        {!! Form::label('NOM_USER', 'USUÁRIO:') !!}
                        {!! Form::text('NOM_USER', '', ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('SENHA', 'SENHA:') !!}
                        {!! Form::password('SENHA', ['class' => 'form-control', ]) !!}
                    </div>
                    <div class="pull-left">
                        <button type='submit' class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Entrar</button>
                        <a href="{{ route('login.indexRecuperaSenha') }}" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-ok"></i> Recuperar Senha</a>
                        <a href="{{ route('login.create') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Fazer Cadastro</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <!--/#associados_create-->

@stop