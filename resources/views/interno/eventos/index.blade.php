@extends('interno.base')

@section('conteudo')
    @include('toast::messages-jquery')
   @if( isset($eventosDisponiveis) )
      <div class="box">
         <div class="box-header">
            <h3 class="box-title">Eventos</h3>
         </div>
         <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                  <th>EVENTO</th>
                  <th>VALOR</th>
                  <th>PERÍODO DE INSCRIÇÃO</th>
                  <th>INSCREVA-SE</th>
                  <th>BOLETO</th>
               </tr>
               </thead>
               <tbody>
      @foreach($eventosDisponiveis as $evento)
                  <tr>
                     <td>{{ $evento['DSCCC'] }}</td>
                     <td>R$ {{ $evento['VALOR'] }}</td>
                     <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $evento['DT_INI_INS'])->format('d/m/Y') }} à {{ Carbon\Carbon::createFromFormat('Y-m-d', $evento['DT_FIM_INS'])->format('d/m/Y') }}</td>
                     <td><a href="{{ route('interno.eventos.efetuarInscricao', ['id' => $evento['CODCC'] ]) }}"> CLIQUE AQUI!</a></td>
                     <td><a target="_blank" href="{{ route('interno.eventos.gerarBoleto', ['id' => $evento['CODCC'] ]) }} " >IMPRIMIR</a></td>
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