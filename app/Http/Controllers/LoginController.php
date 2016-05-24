<?php

namespace frtp\Http\Controllers;

use frtp\Models\Associado;
use frtp\Models\User;
use Grimthorr\LaravelToast\Facade as Toast;
use Illuminate\Http\Request;

use frtp\Http\Requests;
use frtp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Mail;

class LoginController extends Controller
{
    private $login;
    private $data;

   /* public function __construct(Login $login)
    {
        $this->login = $login;
    }
   */

    public function index()
    {
        return view('login.index');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        $dadosForm = $request->all();

        $usuarios = new User();

        if( ($usuarios->where('NOM_USER', $dadosForm["NOM_USER"])->get()->toArray()) )
        {
            Toast::error('Usuário já cadastrado, por favor informe outro Usuário');
            return view('index');
        }

        if( ($usuarios->where('IDUSER', $dadosForm["IDUSER"])->get()->toArray()) )
        {
            Toast::error('CPF já cadastrado, por favor informe outro CPF');
            return view('index');
        }
        else
        {
            $usuarios->create($dadosForm);

            Toast::success('Usuário cadastrador com Sucesso!');
            return view('index');
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function validaLogin(Request $request)
    {
        $dadosUsuariosDB = new User();

        $associados = new Associado();

        $dadosFormLogin = $request->all();

        if ( ($dadosUsuariosDB->where('NOM_USER', $dadosFormLogin["NOM_USER"])->where('SENHA', $dadosFormLogin["SENHA"])->get()->toArray()) )
        {
            $dadosUser = $dadosUsuariosDB->where('NOM_USER', $dadosFormLogin["NOM_USER"])->where('SENHA', $dadosFormLogin["SENHA"])->get()->toArray();

            $request->session()->put('CODUSU', $dadosUser[0]['CODUSU']);

            $request->session()->put('NOME', $dadosUser[0]['NOME']);

            $request->session()->put('NOM_USER', $dadosUser[0]['NOM_USER']);

            $request->session()->put('IDUSER', $dadosUser[0]['IDUSER']);


            $associado = $associados->where('CPF', session('IDUSER'))->first();

            Toast::success('Login Efetuado com Sucesso!');
            //return Redirect::to('login');

            return view('interno.index')->with(compact('associado'));
        }
        else
        {
            Toast::error('Usuário e Senha Inválidos!');
            return view('index');
        }
    }

    public function indexRecuperaSenha()
    {
        return view('login.indexRecuperaSenha');
    }

    public function montaEmailRecuperaSenha(Request $request)
    {
        $cpf = $request->all();

        $registroUsuarios = new User();

        $registroAssociados = new Associado();

        $userSelecionado = $registroUsuarios->where('IDUSER', $cpf["IDUSU"])->get()->toArray();

        if( $userSelecionado == NULL )
        {
            Toast::error('Não existe Usuário para o CPF informado!!');
            return view('login.indexRecuperaSenha');
        }
        else
        {
            $associadoSelecionado = $registroAssociados->where('CPF', $cpf["IDUSU"])->get()->toArray();

            $emailAssociado = $associadoSelecionado[0]['EMAIL'];

            $data = array();

            $data['nome'] = $associadoSelecionado[0]['NOMASS'];
            $data['cpf'] = $userSelecionado[0]['IDUSER'];
            $data['email'] = $associadoSelecionado[0]['EMAIL'];

            Mail::send('login.emailRecuperaSenha', $data, function ($m) use ($emailAssociado)
            {
                $m->from('contato@frtp.org.br', 'FRTP - Federação Rondoniense de Tiro Prático');
                $m->to($emailAssociado)
                    ->subject('Recuperação de Senha ');
            });

            $msg = 'Email de recuperação enviado para '.$emailAssociado;


            Toast::success($msg);
            return view('index');
        }

    }

    public function recuperaSenha()
    {
        return view('login.alteraSenhaForm');
    }

    public function alteraSenha(Request $request)
    {
        $dadosForm = $request->all();

        $idUser = $dadosForm['IDUSER'];

        $usuario =  new User();

        if( $dadosForm['SENHA'] == $dadosForm['SENHA2'] )
        {
            unset($dadosForm['SENHA2']);
            unset($dadosForm['IDUSER']);
            unset($dadosForm['_token']);

            $usuario->where('IDUSER', $idUser)->update($dadosForm);

            Toast::success('Senha alterada com Sucesso!');

            return view('index');
        }
    }

    public function montaEmailContato(Request $request)
    {
        $dadosForm = $request->all();

        $data = array();

        $data['NOME'] = $dadosForm['NOME'];
        $data['EMAIL'] = $dadosForm['EMAIL'];
        $data['MENSAGEM'] = $dadosForm['MESSAGE'];

        Mail::send('login.emailContato', $data, function ($m)
        {
            $m->from('contato@frtp.org.br', 'Contato feito pelo site da FRTP - Federação Rondoniense de Tiro Prático');
            $m->to('adm.frtp@gmail.com')
                ->subject('Contato Site');
        });

        Toast::success('Contato efetuado. Obrigado!');
        return view('index');
    }
}
	