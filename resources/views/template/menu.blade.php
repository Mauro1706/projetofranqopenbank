<?php
/**
 * @var $usuarioLogado ;
 */

?>
<style>
    a.nav-link {
        color: white !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-black-50" href="{{url('/')}}">Franq<b>OpenBank</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($usuarioLogado) && $usuarioLogado) { ?>
                <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/moeda' ? 'bg-info' : '' ?>">
                    <a class="nav-link" href="{{url('/moeda')}}"><i class="fas fa-dollar-sign"></i> Moedas</a>
                </li>
                <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/bolsa' ? 'bg-info' : '' ?>">
                    <a class="nav-link" href="{{url('/bolsa')}}"><i class="fas fa-landmark"></i> Bolsas</a>
                </li>
            <?php } ?>
        </ul>
        <?php if (isset($usuarioLogado) && $usuarioLogado) {  ?>
        <b class="text-white"> {{!empty($user) ? $user['name'] : "" }}</b>
        <form class="form-inline my-2 mx-5 my-lg-0">
            <li class="nav-item dropdown" style="list-style: none; left: -50px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu -align-left" style="background-color: #563d7c;" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-white" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt fa-rotate-180"></i>
                        Sair</a>
                </div>
            </li>
        </form>
        <?php } else { ?>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-dark mx-2 my-sm-0" href="<?= url('/login'); ?>"><i class="fas fa-sign-in-alt"></i>
                Login</a>
        </form>
        <?php } ?>
    </div>
</nav>
