<?php

namespace frtp\Http\Controllers;

use frtp\Models\Associado;
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

    public function create()
    {
        return view('associados.create');
    }

    public function store(Request $request)
    {
        return redirect('associados.index');
    }
}
