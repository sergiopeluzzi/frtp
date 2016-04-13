@extends('app')

@section('content')
    @include('toast::messages-jquery')
    <section id="login_create">
        <div class="container">
            <div class="box">
                <div class="center">
                    <!-- <h2 class="text-info">Associados</h2> -->

                    <p class="lead">Formulário de Cadastro de Usuários</p>
                </div>
                <!--/.center-->

                {!! Form::open(['route' => 'login.store', 'method' => 'post', 'id' => 'login']) !!}

                @include('login.form')

                {!! Form::close() !!}

            </div>
        </div>

    </section>
    <!--/#login_create-->
@stop
