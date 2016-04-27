<?php

namespace frtp\Http\Controllers;

use Grimthorr\LaravelToast\Facade as Toast;
use Illuminate\Support\Facades\Redirect;
use frtp\Models\Associado;
use frtp\Models\Cidade;
use Illuminate\Http\Request;

use frtp\Http\Requests;
use frtp\Http\Controllers\Controller;

class AssociadosController extends Controller
{
    private $associado;
    private $data;

    public function __construct(Associado $associado)
    {
        $this->associado = $associado;
    }

    public function index()
    {
        $this->data['associados'] = $this->associado->all();

        return view('associados.index')->with($this->data);
    }

    public function create(Request $request)
    {
        $data['cidades'] = Cidade::all();

        $data['dados'] = $request->session()->all();

        return view('interno.associados.create')->with($data);
    }

    public function store(Request $request)
    {
        $dadosForm = $request->all();

        $associado = new Associado();

        $associado->create($dadosForm);

        Toast::success('Associado cadastrado com Sucesso!');

        return view('interno.index')->with(compact('associado'));
    }

    public function edit($CPF)
    {
        $associado = $this->associado->where('CPF', $CPF)->first();

        return view('interno.associados.edit')->with(compact('associado'));
    }


    public function update($CPF, Request $request)
    {
        $associado = new Associado();

        $upd = $request->all();

        unset($upd['_token']);
        unset($upd['_method']);

        $this->associado->where(['CPF' => session('IDUSER')])->update($upd);

        Toast::success('Cadastro atualizado com Sucesso!');
        return view('interno.index')->with(compact('associado'));
    }

}
