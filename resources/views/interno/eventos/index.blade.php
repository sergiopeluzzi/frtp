@extends('interno.base')

@section('conteudo')
    @include('toast::messages-jquery')
    @if( isset($eventosDisponiveis) )
        <h2 class="page-header">Eventos</h2>
        <div class="row">
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    @foreach($eventosDisponiveis as $evento)
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#{{ $evento['IDEVENTO'] }}">
                                        {{ $evento['NOME_EVENTO'] }} &nbsp;&nbsp;&nbsp;&nbsp;Data: {{ $evento['DATA_EVENTO'] }}
                                    </a>
                                </h4>
                            </div>
                            <div style="width: 750px;" id="{{ $evento['IDEVENTO'] }}" class="panel-collapse collapse">
                                <div class="box-body">
                                    Período de Inscrição: {{ Carbon\Carbon::createFromFormat('Y-m-d', $evento['DAT_INI'])->format('d/m/Y') }} à {{ Carbon\Carbon::createFromFormat('Y-m-d', $evento['DAT_FIM'])->format('d/m/Y') }}
                                    <br /><br />

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr >
                                                <th ></th>
                                                <th style="text-align: center;">MODALIDADES DO EVENTO</th>
                                                <th style="text-align: center;">VALOR</th>
                                                <th style="text-align: center;">INSCRIÇÃO(ÕES)</th>
                                                <th style="text-align: center;">TOTAL MODALIDADE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($modalidades as $modalidade)
                                            @if($modalidade['IDEVENTO'] == $evento['IDEVENTO'])
                                                <tr>
                                                    {!! Form::open(['route' => 'interno.eventos.efetuarInscricao', 'id' => 'associados']) !!}

                                                    @if($modalidade['JAFEZ'] == 'S' && $modalidade['INS_UNICO'] == 'S')
                                                        <td width="10">
                                                            <input title="VOCÊ JÁ ESTA INSCRITO!" value="{{ $modalidade['CODMOD'] }}" onchange="participaModalidade({{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD']}},{{$evento['IDEVENTO']}})" type="checkbox" id="check.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="check.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" class="minimal-red" disabled>
                                                        </td>
                                                    @else
                                                        <td width="10">
                                                            <input value="{{ $modalidade['CODMOD'] }}" onchange="participaModalidade({{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD']}},{{$evento['IDEVENTO']}})" type="checkbox" id="check.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="check.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" class="minimal-red">
                                                        </td>
                                                    @endif
                                                    <td width="350">{{ $modalidade['DSCMOD'] }}</td>
                                                    <td align="center" width="50">
                                                        <input type="text" style="text-align: center;" id="valor.{{$evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="valor.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" value="{{ $modalidade['VALOR'] }}" size="10" readonly>
                                                        <input type="hidden" style="text-align: center;" id="codEvento.{{$evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="codEvento.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" value="{{ $evento['IDEVENTO'] }}" size="10" readonly>
                                                        <input type="hidden" style="text-align: center;" id="codcc.{{$evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="codcc.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" value="{{ $evento['CODCC'] }}" size="10" readonly>
                                                    </td>
                                                    <td align="center" width="100">
                                                        @if( $modalidade['INS_UNICO'] == 'S' )
                                                            <input style="text-align: center;" id="qtdPistas.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="qtdPistas.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" type="text" value="1" size="4" readonly>
                                                        @endif
                                                        @if( $modalidade['INS_UNICO'] == 'N' )
                                                                <input type="text" style="text-align: center;" id="qtdPistas.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}"  id="qtdPistas.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="qtdPistas.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" size="4">
                                                        @endif
                                                    </td>
                                                    <td align="center" width="100">
                                                        <input type="text" style="text-align: center;" id="totalModalidade.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" name="totalModalidade.{{ $evento['IDEVENTO'].'.'.$modalidade['CODMOD'] }}" readonly>
                                                    </td>

                                                    <!-- <td>
                                                        <input type="hidden" id="insert.////$evento['IDEVENTO'].'.'.$modalidade['CODMOD']}}" name="insert.//$evento['IDEVENTO'].'.'.$modalidade['CODMOD']}}">
                                                    </td> -->


                                                </tr>
                                            @endif
                                        @endforeach
                                            <tr>
                                                <td colspan="4" align="right">TOTAL DA INSCRIÇÃO &nbsp;&nbsp;&nbsp;</td>
                                                <td align="center"><input type="text" style="text-align: center;" id="total.{{ $evento['IDEVENTO'] }}" name="total.{{ $evento['IDEVENTO'] }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="center">
                                                    <button type='submit' class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button>
                                                </td>
                                            </tr>
                                        {!! Form::close() !!}
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.row -->
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