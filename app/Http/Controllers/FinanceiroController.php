<?php

namespace frtp\Http\Controllers;

use Carbon\Carbon;
use frtp\Models\Associado;
use frtp\Models\Eventos;
use frtp\Models\Modalidades;
use frtp\Models\Receber;
use Illuminate\Http\Request;

use frtp\Http\Requests;
use frtp\Http\Controllers\Controller;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associadodb = new Associado();

        $eventosDB = new Eventos();

        $modalidadesDB = new Modalidades();

        $receber = new Receber();

        $associado['associado'] = $associadodb->where('CPF', session('IDUSER'))->first();

        $dataAtual = Carbon::now()->format('Y-m-d');

        if ( $eventosDB->where('DAT_INI','<=', $dataAtual)->where('DAT_FIM','>=', $dataAtual)->get()->toArray() ) {

            $anoAtual = Carbon::now()->format('Y');

            $associado['eventosDisponiveis'] = $eventosDB->where('DAT_INI','<=', $dataAtual)->where('DAT_FIM','>=', $dataAtual)->get()->toArray();

            $associado['modalidades'] = $modalidadesDB->where('ANOBASE','=', $anoAtual)->get()->toArray();

        }

        $codAssociado = $associadodb->where('CPF', session('IDUSER'))->get()->toArray();

        $associado['boletos'] = $receber->where('CODASS', '=', $codAssociado[0]['CODASS'])->get()->toArray();

        return view('interno.financeiro.index')->with($associado);

    }

            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
