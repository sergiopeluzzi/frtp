<?php

namespace frtp\Http\Controllers;


use Grimthorr\LaravelToast\Facade as Toast;
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

        $associado['associado'] = $associadodb->where('CPF', session('IDUSER'))->first();

        $associado['eventosDisponiveis'] = $eventosDB->orderBy('CODCC','DESC')->get()->toArray();

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
    }

    public function gerarBoleto($id)
    {
        $associadoDB = new Associado();

        $receberDB = new Receber();

        $associado = $associadoDB->where('CPF', session('IDUSER'))->first();

        $receber = $receberDB->where('CODASS',$associado->CODASS)->where('CODCC', $id)->get()->toArray();

        if($receber <> NULL)
        {
            $cidade = DB::select("Select DSCCID,UFCID FROM CIDADES WHERE CODCID = $associado->CODCID");
            $sacado = new Agente($associado->NOMASS, $associado->CPF, $associado->ENDERECO, $associado->CEP, $cidade[0]->DSCCID, $cidade[0]->UFCID);
            $cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

            $boleto = new Sicoob(array(
                // Parâmetros obrigatórios
                'dataVencimento' => new DateTime($receber[0]['VENCTO']),
                'valor' => $receber[0]['V_PARCELA'],
                'sequencial' => $receber[0]['DOCTO'], // Para gerar o nosso número
                'sacado' => $sacado,
                'cedente' => $cedente,
                'agencia' => 3271, // Até 4 dígitos
                'carteira' => 18,
                'conta' => 370258, // Até 8 dígitos
                'convenio' => 3197, // 4, 6 ou 7 dígitos
            ));

            echo $boleto->getOutput();

        }
        else
        {

            $associado = NULL;
            $associadodb = new Associado();

            $eventosdb = new Eventos();

            $associado['associado'] = $associadodb->where('CPF', session('IDUSER'))->first();

            $associado['eventosDisponiveis'] = $eventosdb->orderBy('CODCC','DESC')->get()->toArray();

            Toast::warning('Você não esta inscrito no Evento Selecionado!');

            return view('interno.eventos.index')->with($associado);

        }





    }


}

