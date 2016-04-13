@extends('interno.base')

@section('conteudo')
    <section class="content-header">
        <h1>
            Meus Dados
        </h1>
        <br>
    </section>
    <section id="interno_associados_edit">
        <div class="containers">
            <div class="box">

                <!--/.center-->


                {!! Form::model($associado, ['route' => 'interno.associados.update', session('IDUSER'), 'method' => 'put', 'id' => 'associados']) !!}

                        @include('interno.associados.form')

                {!! Form::close() !!}

            </div>
        </div>

    </section>
@stop
