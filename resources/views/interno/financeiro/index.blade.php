@extends('interno.base')

@section('conteudo')
    @include('toast::messages-jquery')
    @if( isset($boletos) )
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Financeiro</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">BOLETO</th>
                        <th style="text-align: center;">EMISSÃO</th>
                        <th style="text-align: center;">VENCIMENTO</th>
                        <th style="text-align: center;">VALOR</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($boletos as $boleto)
                        <tr>
                            <td style="text-align: center;"><a target="_blank" href="{{ route('interno.eventos.gerarBoleto', ['id' => $boleto['DOCTOVND'] ]) }}"><img src="{{asset('site/images/print.png')}}"></a></td>
                            <td style="text-align: center;">{{ Carbon\Carbon::createFromFormat('Y-m-d', $boleto['EMISSAO'])->format('d/m/Y') }}</td>
                            <td style="text-align: center;">{{ Carbon\Carbon::createFromFormat('Y-m-d', $boleto['VENCTO'])->format('d/m/Y') }}</td>
                            <td style="text-align: center;">R$ {{ $boleto['V_PARCELA'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            @else
                <section class="content-header">
                    <h1>Eventos</h1>
                    <br>
                </section>

                <div class="containers">
                    <h4 style="color:red"> Não existem Eventos disponiveis para Inscrição. Por favor consulte o calendário da Federação.</h4>
                </div>
    @endif
@stop