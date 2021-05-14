<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        //$users = $request->session()->get('users');
        //$request->session()->remove('users');
        $msg = $request->session()->get('msg');
        $request->session()->remove('msg');
        $usuarioLogado = $request->session()->exists('user');
        return view('login/login')->with([
            'usuarioLogado' => $usuarioLogado,
            'msg' => $msg,
        ]);
    }

    public function login(Request $request)
    {
        $login = $request->login;
        $senha = $request->senha;
        $username = "";

        $loginUser = explode('.', $login);
        if (count($loginUser) <= 1 || (count($loginUser) > 1 && strtoupper($loginUser[1]) !== 'FRANQ')){
            $request->session()->put('msg', 'Login de usuario não confere com o padrão de login do sistema. Tente novamente.');
            return redirect()->action([LoginController::class, 'index']);
        }

        $users = collect($request->session()->get('users'));

        $usuExist = false;
        $senhaErrada = false;
        foreach ($users as $key => $use) {
            if ($use['login'] == $loginUser[0]){
                $usuExist = true;
                if ($use['senha'] == $senha) {
                    $senhaErrada = true;
                    $username = $use['username'];
                }
            }
        }

        if (!$usuExist){
            $request->session()->put('msg', 'Usuario não existe. Registre-se no sistema.');
            return redirect()->action([LoginController::class, 'index']);
        } else if (!$senhaErrada) {
            $request->session()->put('msg', 'Usuario e/ou senha incorretas. Tente novamente.');
            return redirect()->action([LoginController::class, 'index']);
        }

        $usuario = [
            'name' => $username,
            'login' => $loginUser[0],
            'senha' => $senha,
        ];

        $request->session()->put('user', $usuario);

        return redirect()->action([PropertyController::class, 'index']);
    }

    public function register(Request $request)
    {
        $msg = $request->session()->get('msg');
        $request->session()->remove('msg');
        $usuarioLogado = $request->session()->exists('user');

        return view('login/register')->with([
            'usuarioLogado' => $usuarioLogado,
            'msg' => $msg,
        ]);
    }

    public function gravarUsuario(Request $request)
    {
        $username = $request->name;
        $login = $request->login;
        $senha = $request->senha;

        $users = $request->session()->get('users');
        $usuExist = false;
        foreach (collect($users)->all() as $key => $use) {
            if (($use['login'] == $login) && ($use['senha'] == $senha)){
                $usuExist = true;
            }
        }

        if ($usuExist){
            $request->session()->put('msg', 'Usuario já existe na base de dados. Faça login no sistema.');
            return redirect()->action([LoginController::class, 'index']);
        }

        $newUsers = [
            'username' => $username,
            'login' => $login,
            'senha' => $senha,
        ];

        $request->session()->push('users', $newUsers);

        $request->session()->put('msg', 'suario registrado na base de dados. Faça login no sistema.');
        return redirect()->action([LoginController::class, 'index']);
    }

    public function logout(Request $request)
    {
        $request->session()->remove('user');

        return redirect()->action([PropertyController::class, 'index']);
    }
}
