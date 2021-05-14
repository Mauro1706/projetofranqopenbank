<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $usuarioLogado = $request->session()->exists('user');
        if (!$usuarioLogado)
            return redirect()->action([LoginController::class, 'index']);

        $user = $request->session()->get('user');
        return view('template.welcome')->with([
            'usuarioLogado' => $usuarioLogado,
            'user' => $user
        ]);
    }

    public function moeda(Request $request)
    {
        $usuarioLogado = $request->session()->exists('user');
        if (!$usuarioLogado)
            return redirect()->action([LoginController::class, 'index']);

        $user = $request->session()->get('user');

        $client = new Client();
        $url = "https://api.hgbrasil.com/finance?key=198817de";

        $response = $client->request('GET', $url, ['verify' => false]);

        $responseBody = collect(json_decode($response->getBody(), true))->all();

        return view('franq.visualizar')->with([
            'response' => $responseBody['results'],
            'usuarioLogado' => $usuarioLogado,
            'user' => $user
        ]);
    }

    public function bolsa(Request $request)
    {
        $usuarioLogado = $request->session()->exists('user');
        if (!$usuarioLogado)
            return redirect()->action([LoginController::class, 'index']);

        $user = $request->session()->get('user');

        $client = new Client();
        $url = "https://api.hgbrasil.com/finance?key=198817de";

        $response = $client->request('GET', $url, ['verify' => false]);

        $responseBody = collect(json_decode($response->getBody(), true))->all();

        return view('franq.bolsa')->with([
            'response' => $responseBody['results'],
            'usuarioLogado' => $usuarioLogado,
            'user' => $user
        ]);
    }
}
