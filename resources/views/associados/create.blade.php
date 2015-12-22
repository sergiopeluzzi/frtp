@extends('app')

@section('content')

    <section id="associados_create">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2 class="text-info">Associados</h2>

                    <p class="lead">Formulário de Cadastro do Associado</p>
                </div>
                <!--/.center-->

                {!! Form::open(['route' => 'associados.store']) !!}

                    @include('associados.form')

                {!! Form::close() !!}

            </div>
        </div>

    </section>
    <!--/#associados_create-->

@stop