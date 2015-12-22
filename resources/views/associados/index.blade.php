@extends('app')

@section('content')

    <section id="associados_index">
        <div class="container">
            <div class="box">
                <div class="gap"></div>
                <div class="center">
                    <h2>Associados</h2>

                    <p class="lead">Lista dos Associados</p>
                </div>
                <!--/.center-->

                <table class="table table-responsive table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" width="40plx">Codigo</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" width="200px">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($associados as $associado)
                        <tr>
                            <td class="text-center">{{ $associado->CODASS }}</td>
                            <td>{{ $associado->NOMASS }}</td>
                            <td>
                                <a class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-minus"></i> Excluir</a>
                                <a class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-info-sign"></i>
                                    Informações</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('associados.create') }}" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
            </div>
        </div>

    </section>
    <!--/#associados_index-->

@stop