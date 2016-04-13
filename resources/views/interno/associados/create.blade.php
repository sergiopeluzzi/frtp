@extends('interno.base')

@section('conteudo')
    <section class="content-header">
        <h1>
            Associado -
            <small> Formulário de Cadastro do Associado.</small>
        </h1>
        <br>
    </section>
    <section id="interno_associados_create">
        <div class="containers">
            <div class="box">

                <!--/.center-->

                {!! Form::open(['route' => 'interno.associados.store', 'id' => 'associados']) !!}

                    @include('interno.associados.form')

                {!! Form::close() !!}

            </div>
        </div>

    </section>
@stop
