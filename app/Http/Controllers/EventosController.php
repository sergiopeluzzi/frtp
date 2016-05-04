<?php

namespace frtp\Http\Controllers;


use frtp\Models\Inscricao;
use frtp\Models\Modalidades;
use Grimthorr\LaravelToast\Facade as Toast;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DateTime;
use frtp\Models\Receber;
use Illuminate\Support\Facades\DB;
use openBoleto\Banco\BancoDoBrasil;
use openBoleto\Agente;

use Carbon\Carbon;
use frtp\Models\Associado;
use frtp\Models\Eventos;
use Illuminate\Http\Request;

use frtp\Http\Requests;
use frtp\Http\Controllers\Controller;
use Illuminate\Support\Str;
use openBoleto\Banco\Sicoob;

class EventosController extends Controller
{
    private $eventos;
    private $data;

    public function __construct(Eventos $eventos)
    {
        $this->eventos = $eventos;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $associadodb = new Associado();

        $eventosDB = new Eventos();

        $modalidadesDB = new Modalidades();

        $inscricao = new Inscricao();

        $associado['associado'] = $associadodb->where('CPF', session('IDUSER'))->first();

        $codAssociado = $associadodb->where('CPF', session('IDUSER'))->get()->toArray();

        $dataAtual = Carbon::now()->format('Y-m-d');

        if ( $eventosDB->where('DAT_INI','<=', $dataAtual)->where('DAT_FIM','>=', $dataAtual)->get()->toArray() )
        {
            $anoAtual = Carbon::now()->format('Y');

            $associado['eventosDisponiveis'] = $eventosDB->where('DAT_INI','<=', $dataAtual)->where('DAT_FIM','>=', $dataAtual)->get()->toArray();

            $associado['modalidades'] = $modalidadesDB->where('ANOBASE','=', $anoAtual)->get()->toArray();

        }

        for($i=0; $i<count($associado['modalidades']); $i++)
        {
            for($j=0; $j<count($associado['eventosDisponiveis']); $j++)
            {
                $associado['modalidades'][$i]['IDEVENTO'] = $associado['eventosDisponiveis'][$j]['IDEVENTO'];

                $modalidadeEvento[] = $associado['modalidades'][$i];
            }
        }

        for($k=0; $k<count($modalidadeEvento); $k++)
        {
            if($inscricao->where('CODMAT','=', $codAssociado[0]['CODASS'])->where('CODMOD','=', $modalidadeEvento[$k]['CODMOD'])->where('IDEVENTO','=', $modalidadeEvento[$k]['IDEVENTO'])->get()->toArray() )
            {
                $modalidadeEvento[$k]['JAFEZ'] = 'S';
            }
            else
            {
                $modalidadeEvento[$k]['JAFEZ'] = 'N';
            }
        }

        $associado['modalidades'] = $modalidadeEvento;

        return view('interno.eventos.index')->with($associado);
/*
        $dataAtual = Carbon::now()->format('Y-m-d');

        if ( $eventosDB->where('DT_INI_INS','<=', $dataAtual)->where('DT_FIM_INS','>=', $dataAtual)->get()->toArray() )
        {
            $associado['eventosDisponiveis'] = $eventosDB->where('DT_INI_INS','<=', $dataAtual)->where('DT_FIM_INS','>=', $dataAtual)->get()->toArray();

            return view('interno.eventos.index')->with($associado);
        }
        else
        {
            return view('interno.eventos.index')->with($associado);
        }
*/
    }


    public function calculaDigitoVerificador($numCoop, $numCli, $sequencia)
    {
        $constante = '3197';
        $dgConstante = 0;
        $soma = 0;
        $resto = 0;

        $peso = 0;
        $digito = 0;

        $numero = str_pad((int)$numCoop,4,"0",STR_PAD_LEFT).str_pad((int)$numCli,10,"0",STR_PAD_LEFT).str_pad((int)$sequencia,7,"0",STR_PAD_LEFT);

        $cont = 0;

        for ($i=0; $i <strlen($numero); $i++)
        {
            $peso = substr($constante,$cont,1);

            $soma = $soma+($numero[$i]*$peso);

            if($cont == 3)
            {
                $cont = 0;
            }
            else
            {
                $cont++;
            }

        }

        $resto = $soma%11;

        if(( $resto == 0 )OR( $resto == 1 ))
        {
            $digito = 0;
        }
        else
        {
            $digito = 11 - $resto;
        }

        return $digito;
    }


    /**
     * @param $id
     * @param Request $request
     */
    public function efetuarInscricao($id, Request $request)
    {
        $inscricao = new Inscricao();

        $eventoDB = new Eventos();

        $associadoDB = new Associado();

        $modalidadesDB = new Modalidades();

        $receber = new Receber();

        $associado = $associadoDB->where('CPF', session('IDUSER'))->get()->toArray();

        $tipoDoc = DB::select("SELECT A.Cta_CC FROM TipoDoc A WHERE A.coddoc = '001'");

        $sequencia = DB::select('Select Gen_Id(Seq_Insc,1) as SeqInsc from RDB$DATABASE');

        $form = $request->all();

        $i = 0;

        foreach ($form as $key => $value)
        {
            for ($j = 0; $j < count($form); $j++ )
            {
                if($key = 'check_'.$i.'_'.$j && $value != '')
                {
                    if(Input::get('check_'.$i.'_'.$j) != null)
                    {
                        $dados['SEQINSC'] = $sequencia[0]->SEQINSC;

                        $dados['CODMOD'] = Input::get('check_'.$i.'_'.$j);

                        $dados['IDEVENTO'] = Input::get('codEvento_'.$i.'_'.$j);

                        $dados['DATA'] = Carbon::now()->format('Y-m-d');

                        $dados['CODMAT'] = $associado[0]['CODASS'];

                        $dados['QTD'] = Input::get('qtdPistas_'.$i.'_'.$j);

                        $dados['VALOR'] = Input::get('valor_'.$i.'_'.$j);

                        $dados['CODDOC'] = '001';

                        $dados['CTA_CC'] = $tipoDoc[0]->CTA_CC;

                        $dados['CODCC'] = Input::get('codcc_'.$i.'_'.$j);

                        $inscricao->create($dados);
                    }
                }
            }

            $i++;
        }

        DB::select("Execute Procedure SP_Boletos(".$sequencia[0]->SEQINSC.", 'I')");

        if ( $eventoDB->where('DAT_INI','<=', Carbon::now()->format('Y-m-d'))->where('DAT_FIM','>=', Carbon::now()->format('Y-m-d'))->get()->toArray() )
        {
            $anoAtual = Carbon::now()->format('Y');

            $associado['eventosDisponiveis'] = $eventoDB->where('DAT_INI','<=', Carbon::now()->format('Y-m-d'))->where('DAT_FIM','>=', Carbon::now()->format('Y-m-d'))->get()->toArray();

            $associado['modalidades'] = $modalidadesDB->where('ANOBASE','=', $anoAtual)->get()->toArray();
        }

        $associado['associado'] = $associadoDB->where('CPF', session('IDUSER'))->first();

        $codAssociado = $associadoDB->where('CPF', session('IDUSER'))->get()->toArray();

        $associado['boletos'] = $receber->where('CODASS', '=', $codAssociado[0]['CODASS'])->get()->toArray();

        Toast::success('Inscrição efetuada com Sucesso! Imprima o boleto!');

        return view('interno.financeiro.index')->with($associado);



        /*

                $eventoDB = new Eventos();

                $associadoDB = new Associado();

                $receber = new Receber();

                $evento = $eventoDB->where('CODCC', $id)->get()->toArray();

                $associado = $associadoDB->where('CPF', session('IDUSER'))->get()->toArray();

                if ( $receber->where('CODASS','=', $associado[0]['CODASS'])->where('CODCC','=', $id)->get()->toArray() )
                {
                    $associado['associado'] = $associadoDB->where('CPF', session('IDUSER'))->first();

                    $associado['eventosDisponiveis'] = $eventoDB->orderBy('CODCC','DESC')->get()->toArray();

                    Toast::warning('Você já esta inscrito no Evento Selecionado!');

                    return view('interno.eventos.index')->with($associado);
                }
                else
                {

                    $dataAtual = Carbon::now()->format('Y-m-d');

                    if (( $evento[0]['DT_INI_INS'] <= $dataAtual )&&( $evento[0]['DT_FIM_INS'] >= $dataAtual ))
                    {
                        $tipoDoc = DB::select("Select
                          A.Cta_CC,

                          D.NomeGen, --Onde está armazenado o GENERATOR da carteira para Nosso Núm.
                          B.CodCoop as NumCoop,
                          B.CodCliente as NumCli,
                          B.AgeBco,B.POSTO,
                          D.Convenio,C.Cod_Bco

                        from TipoDoc A
                        Left join CCorrente B on (B.Cta_CC = A.Cta_CC)
                        left join Bancos C on (C.CodBanco = B.CodBanco)
                        left join Carteira D on (D.CodCta = A.Cta_CC and D.CodCart = A.CodCart)
                        where A.coddoc = '001'");

                        $nomeGerador = $tipoDoc[0]->NOMEGEN;

                        $sequencialNossoNumeroResp = DB::select('select Gen_Id('.$nomeGerador.',1) FROM RDB$DATABASE');

                        $sequencialNossoNumero = $sequencialNossoNumeroResp[0]->GEN_ID;

                        $digitoVerificador = $this->calculaDigitoVerificador($tipoDoc[0]->NUMCOOP, $tipoDoc[0]->NUMCLI, $sequencialNossoNumero);

                        $nossoNumeroLimpo = $sequencialNossoNumero.$digitoVerificador;

                        $nossoNumero = str_pad((int)$nossoNumeroLimpo,8,"0",STR_PAD_LEFT);




                        //Define a data de vencimento do boleto
                        $dataEncerraIns = Carbon::createFromFormat('Y-m-d', $evento[0]['DT_FIM_INS'])->format('d/m/Y');
                        $a = explode('/', $dataEncerraIns);
                        $vencimento = ($a[0] - 1).'/'.$a[1].'/'.$a[2];

                        $ctaReceber['EMISSAO'] = Carbon::now()->format('Y-m-d');

                        $ctaReceber['DOCTO'] = $nossoNumero;

                        $ctaReceber['PARC'] = 1;

                        $ctaReceber['CODDOC'] = 001;

                        $ctaReceber['CODASS'] = $associado[0]['CODASS'];

                        $ctaReceber['VENCTO'] = $evento[0]['DT_FIM_INS'];

                        $ctaReceber['V_PARCELA'] = $evento[0]['VALOR'];

                        $ctaReceber['CODCC'] = $evento[0]['CODCC'];

                        $receber->create($ctaReceber);




                        $associado['associado'] = $associadoDB->where('CPF', session('IDUSER'))->first();

                        $associado['eventosDisponiveis'] = $eventoDB->orderBy('CODCC','DESC')->get()->toArray();


                        Toast::success('Inscrição efetuada com Sucesso! Imprima o boleto!');
                        return view('interno.eventos.index')->with($associado);

                    }
                    else
                    {
                        $associado['associado'] = $associadoDB->where('CPF', session('IDUSER'))->first();

                        $associado['eventosDisponiveis'] = $eventoDB->orderBy('CODCC','DESC')->get()->toArray();


                        Toast::warning('Evento fora do Prazo de Inscrição!');

                        return view('interno.eventos.index')->with($associado);

                    }

                }
        */
    }

    public function gerarBoleto($id)
    {
        $associadoDB = new Associado();

        $receberDB = new Receber();

        $eventosDB = new Eventos();

        $inscricaoDB = new Inscricao();

        $modalidadesDB = new Modalidades();

        $associado = $associadoDB->where('CPF', session('IDUSER'))->first();

        $receber = $receberDB->where('CODASS',$associado->CODASS)->where('DOCTOVND', $id)->get()->toArray();

        $inscricao = $inscricaoDB->where('SEQINSC',$id)->where('CODMAT',$associado->CODASS)->get()->toArray();

        $evento = $eventosDB->where('IDEVENTO',$inscricao[0]['IDEVENTO'])->get()->toArray();

        for($i=0; $i<count($inscricao); $i++)
        {
            $a[] = $modalidadesDB->where('CODMOD',$inscricao[$i]['CODMOD'])->get()->toArray();
        }

        $dscMod = '';
        $qtd = '';

        for($j=0; $j<count($a); $j++)
        {
            for($l=0; $l<count($a[$j]); $l++)
            {
                $dscMod = $dscMod.$inscricao[$j]['QTD']{0}.'x'.' | '.$a[$j][$l]['DSCMOD'].'<br />';
                //$qtd = $qtd.$inscricao[$j]['QTD']{0}.'x';
            }
        }

        $demostrativo = 'EVENTO: '.$evento[0]['NOME_EVENTO'].';<br />INSCRIÇÃO(ÕES) | MODALIDADES <br />'.$dscMod;

        if($receber <> NULL)
        {
            $cidade = DB::select("Select DSCCID,UFCID FROM CIDADES WHERE CODCID = $associado->CODCID");
            $carteira = DB::select("Select CODCART FROM TIPODOC WHERE CODDOC = " .$receber[0]['CODDOC']. "");
            $instrucao = DB::select("Select INSTRU_BCO, INSTRU_COB, CODEMP FROM CCORRENTE WHERE CTA_CC = " .$receber[0]['CTA_CC']. "");
            $dadosCedente = DB::select("Select * FROM EMPRESA WHERE  CODEMP = " .$instrucao[0]->CODEMP. "");

            $sacado = new Agente($associado->NOMASS, $associado->CPF, $associado->ENDERECO, $associado->CEP, $cidade[0]->DSCCID, $cidade[0]->UFCID);
            $cedente = new Agente($dadosCedente[0]->NOMEEMPRESA, $dadosCedente[0]->CNPJ, $dadosCedente[0]->ENDERECO, $dadosCedente[0]->CEP, $dadosCedente[0]->CID_REP);

            $boleto = new Sicoob(array(
                // Parâmetros obrigatórios
                'dataVencimento' => new DateTime($receber[0]['VENCTO']),
                'valor' => $receber[0]['V_PARCELA'],
                'sequencial' => $receber[0]['DOCTO'], // Para gerar o nosso número
                'sacado' => $sacado,
                'cedente' => $cedente,
                'agencia' => 3271, // Até 4 dígitos
                'carteira' => $carteira[0]->CODCART,
                'conta' => 370258, // Até 8 dígitos
                'convenio' => 3197, // 4, 6 ou 7 dígitos
                'especieDoc' => 'DM',
                'numeroDocumento' => $receber[0]['SEQDOC'],
                'descricaoDemonstrativo' => $demostrativo,
                'instrucoes' => $instrucao[0]->INSTRU_BCO.'<br />'.$instrucao[0]->INSTRU_COB,
            ));

            echo $boleto->getOutput();

        }
        else
        {
            $associado = NULL;


            if ( $eventosDB->where('DAT_INI','<=', Carbon::now()->format('Y-m-d'))->where('DAT_FIM','>=', Carbon::now()->format('Y-m-d'))->get()->toArray() )
            {
                $anoAtual = Carbon::now()->format('Y');

                $associado['eventosDisponiveis'] = $eventosDB->where('DAT_INI','<=', Carbon::now()->format('Y-m-d'))->where('DAT_FIM','>=', Carbon::now()->format('Y-m-d'))->get()->toArray();

                $associado['modalidades'] = $modalidadesDB->where('ANOBASE','=', $anoAtual)->get()->toArray();
            }

            $associado['associado'] = $associadoDB->where('CPF', session('IDUSER'))->first();

            Toast::warning('Você não esta inscrito no Evento Selecionado!');

            return view('interno.eventos.index')->with($associado);

        }





    }


}

