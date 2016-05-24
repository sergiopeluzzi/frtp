<?php

namespace frtp\Http\Controllers;

use Carbon\Carbon;
use frtp\Models\Eventos;
use frtp\Models\Modalidades;
use Illuminate\Http\Request;

use frtp\Http\Requests;
use frtp\Http\Controllers\Controller;

class siteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventosDB = new Eventos();

        $modalidadesDB = new Modalidades();

        $dataAtual = Carbon::now()->format('Y-m-d');

        if ( $eventosDB->where('DAT_INI','<=', $dataAtual)->where('DAT_FIM','>=', $dataAtual)->get()->toArray() )
        {
            $anoAtual = Carbon::now()->format('Y');

            $eventosDisponiveis['eventosDisponiveis'] = $eventosDB->where('DAT_INI', '<=', $dataAtual)->where('DAT_FIM', '>=', $dataAtual)->get()->toArray();

        }
        else
        {
            $eventosDisponiveis['eventosDisponiveis'] = null;
        }

        $eventosDisponiveis['modalidadesDisponiveis'] = $modalidadesDB->where('ANOBASE','=', $anoAtual)->get()->toArray();

        $eventosDisponiveis['modalidadesDisponiveis'];

        return view('index')->with($eventosDisponiveis);
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
