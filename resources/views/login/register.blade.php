@extends('master')
<?php
/**
 * @var $msg ;
 */
?>
@section('content')
    <br/>
    <div class="panel text-center">
        <h1>Registrar Usuário</h1>
    </div>
    <br/>
    <div class="container">
        <form class="form" action="{{url('/gravarUsuario')}}" method="post">
            <?= csrf_field(); ?>
            <?= method_field('PUT'); ?>
            <div class="form-group row">
                <label for="inputNome" class="col-sm-4 col-form-label text-right">Nome Completo:</label>
                <div class="col-sm-6">
                    <input type="input" required class="form-control" name="name" id="inputNome" placeholder="Nome Completo">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Login:</label>
                <div class="col-sm-3">
                    <input type="login" required class="form-control" name="login" id="inputEmail3" placeholder="nomeusuario">
                </div>
                <div class="col-sm-3">
                    <label for="inputNome" class="col-form-label"><b>.franq</b></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label text-right">Senha:</label>
                <div class="col-sm-6">
                    <input type="password" required class="form-control" name="senha" id="inputPassword3" placeholder="Senha">
                </div>
            </div>
            <br/>
            <div class="text-center col-md-12">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>
    </div>
@endsection
