@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="card text-white bg-primary mb-6" style="max-width: 28rem;margin-left:30px;">
                                <div class="card-header">Produtos Cadastrados</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$values['products']}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-dark bg-light mb-3" style="max-width: 28rem;">
                                <div class="card-header">Tags Cadastradas</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$values['tags']}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h3 class="text-center">Relatório de Produto por Tags</h3>

                        <table class="table  table-striped" id="table_reports">
                            <thead>
                                <tr>
                                    <th>Nome da Tag</th>
                                    <th>Total de Produtos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($values['table'] as $value)
                                <tr>
                                    <td>{{$value->name ?? "Produtos Sem Tag"}}</td>
                                    <td>{{$value->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table_reports').DataTable({
            searching: false,
        });

    });
</script>
@endsection