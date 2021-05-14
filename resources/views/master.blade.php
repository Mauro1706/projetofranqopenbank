<!doctype html>
<html lang="bt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo-franq.png') }}" type="image/x-icon">
    <title>FraqOpenBank</title>

    <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">
    <link rel="stylesheet" href="<?= asset('fontawesome/css/all.css'); ?>">
</head>
<body>
@include('template.menu')
<div class="container my-2">
    @yield('content')
</div>

<script src="<?= asset('js/app.js'); ?>"></script>

</body>
</html>
