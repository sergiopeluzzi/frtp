@extends('app')

@section('content')
    @include('toast::messages-jquery')
    <section id="login_formRecupera">
        <div class="container">
            <div class="box">
                <div class="center">
                    <!-- <h2 class="text-info">Associados</h2> -->

                    <p class="lead">Recuperar Senha</p>
                </div>
                <!--/.center-->

                {!! Form::open(['route' => 'login.montaEmailRecuperaSenha', 'method' => 'post', 'id' => 'login']) !!}

                <div class="row">
                    <legend class="form-group text-info">Informe o CPF cadastrado.</legend>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        {!! Form::label('IDUSER', 'CPF:') !!}
                        {!! Form::text('IDUSER', '', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="pull-left">
                    <button type='submit' class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Recuperar</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </section>
    <!--/#login_create-->

@stop