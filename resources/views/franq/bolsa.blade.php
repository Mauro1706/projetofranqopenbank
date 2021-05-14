@extends('master')
<?php $moedaLocal = "BRL" ?>
@section('content')
    <h1 class="my-5 text-center text-primary">Franq OpenBank</h1>

    <div class="row">
        <table class="table table-responsive">
            <tbody>
            <?php foreach ($response['stocks'] as $key => $bolsa) { ?>
            <tr class="text-center btn-group-vertical col-md-5">
                <td class="bg-dark text-white text-left col-md-12">
                    {{$key}} <br> <small>{{$bolsa['location']}}</small>
                </td>
                <td class="col-md-12">
                    {{isset($bolsa['points']) ? $bolsa['points'] : "0"}} pts
                </td>
                <td class="col-md-12 text-center <?= (double)$bolsa['variation'] > 0 ? 'text-success' : 'text-danger' ?>">
                    {{$bolsa['variation']}} %
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

@endsection
