@extends('app')

@section('content')

    <section id="login_formRecupera">
        <div class="container">
            @include('toast::messages')
            <div class="box">
                <div class="center">
                    <!-- <h2 class="text-info">Associados</h2> -->
                    <p class="lead" style="font-size: large;">Redefinir Senha</p>
                </div>
                <!--/.center-->

                {!! Form::open(['route' => 'login.alteraSenha', 'method' => 'post', 'id' => 'loginAlteraSenha']) !!}

                <div class="row">
                    <legend class="form-group text-info">Cadastre a nova Senha.</legend>
                </div>
                <div class="row">
                    <div class="4u">
                        {!! Form::label('SENHA', 'Senha:') !!}
                        {!! Form::password('SENHA', ['class' => 'form-control']) !!}
                    </div>
                    <div class="4u">
                        {!! Form::label('SENHA2', 'Confirma Senha:') !!}
                        {!! Form::password('SENHA2', ['class' => 'form-control']) !!}
                    </div>

                    <div>
                        {!! Form::hidden('IDUSER', $_GET['id']) !!}
                    </div>
                </div>
                <br>
                <div class="4u">
                    <button type='submit' class="button style1"></i> Alterar</button>
                </div>
                <br>
                {!! Form::close() !!}

            </div>
        </div>

    </section>
    <!--/#login_create-->

@stop