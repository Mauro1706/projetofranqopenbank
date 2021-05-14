@extends('master')
<?php $moedaLocal = "BRL" ?>
@section('content')
    <h1 class="my-5 text-center text-primary">Franq OpenBank</h1>

    <div class="row">
        <table class="table table-responsive">
            <tbody>
            <?php foreach ($response['currencies'] as $key => $moedas) { ?>
            <?php if ($key == 'source') { $moedaLocal = $moedas; continue; } ?>
            <tr class="text-center btn-group-vertical col-md-3">
                <td class="bg-dark text-white text-left col-md-12">
                   {{$moedas['name']}} - {{$key}} para {{$moedaLocal}}
                </td>
                <td class="col-md-12">
                    $ {{$moedas['buy']}}
                </td>
                <td class="col-md-12">
                    {{$moedas['sell'] ?: '--'}}
                </td>
                <td class="col-md-12 text-center <?= (double)$moedas['variation'] > 0 ? 'text-success' : 'text-danger' ?>">
                    {{$moedas['variation']}} %
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

@endsection
