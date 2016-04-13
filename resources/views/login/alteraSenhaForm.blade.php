@extends('app')

@section('content')

    <section id="login_formRecupera">
        <div class="container">
            @include('toast::messages')
            <div class="box">
                <div class="center">
                    <!-- <h2 class="text-info">Associados</h2> -->

                    <p class="lead">Redefinir Senha</p>
                </div>
                <!--/.center-->

                {!! Form::open(['route' => 'login.alteraSenha', 'method' => 'post', 'id' => 'login']) !!}

                <div class="row">
                    <legend class="form-group text-info">Cadastre a nova Senha.</legend>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('SENHA', 'Senha:') !!}
                        {!! Form::password('SENHA', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('SENHA2', 'Confirma Senha:') !!}
                        {!! Form::password('SENHA2', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::hidden('IDUSER', $_GET['id']) !!}
                    </div>
                </div>
                <div class="pull-left">
                    <button type='submit' class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Alterar</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </section>
    <!--/#login_create-->

@stop