@extends('master')
<?php
/**
 * @var $msg;
 */
//print_r($users);
?>
@section('content')
    <div class="d-flex justify-content-center my-2">
        <div class="user_card">
            <div class="col-12 text-center my-5">
                <img src="{{ asset('img/logo-franq.png') }}" alt="FranqOpenBanq"
                     style="border: 2px solid #00BFFF; width: 100px; height: 100px; border-radius: 50px;"/>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="post" action="{{ url('/logar') }}">

                    <?= csrf_field(); ?>
                    <?= method_field('PUT'); ?>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="login" class="form-control input_user" value="" placeholder="usuario.franq">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="senha" class="form-control input_pass" value=""
                               placeholder="senha">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Lembre de mim</label>
                        </div>
                    </div>
                    <?php if ($msg != "") { ?>
                    <div class="form-group">
                        <label class="text-danger">{{$msg}}</label>
                    </div>
                    <?php } ?>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn btn-outline-primary">Entrar</button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Ainda não tem conta? <a href="{{url('/register')}}" class="ml-2">Inscrever-se</a>
                </div>
                <div class="d-flex justify-content-center links">
                    {{--<a href="#">Esqueci minha senha</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
