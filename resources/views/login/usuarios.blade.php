@extends('master')
<?php
/**
 * @var $usuarios ;
 */
?>
@section('content')
    <h1 class="text-center text-primary my-5">Lista de Usuário</h1>
    <div class="container">
        <div class="col-md-12 text-right">
            <a href="{{url('/register')}}" class="btn btn-success my-2"><i class="fas fa-plus-circle"></i> Novo</a>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-primary text-white text-center">
                <th></th>
                <th>Nome</th>
                <th>Login</th>
                <th>Senha</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($usuarios)) { ?>
            <?php foreach ($usuarios as $key => $usu) { ?>
            <tr class="text-center">
                <td>{{$key + 1}}</td>
                <td class="text-left">{{$usu['username']}}</td>
                <td>{{$usu['login'].'.franq' }}</td>
                <td>******</td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr class="text-center text-danger">
                <td colspan="4">NENHUM REGISTRO ENCONTRADO</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
@endsection
