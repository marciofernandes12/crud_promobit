@extends('layouts.app')
@section('content')
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex flex-row bd-highlight mb-3">{{ __('Produtos') }}
                    <a href="{{ route('products@store') }}" class="position-absolute top-0 end-0">
                        <button type="submit" class="btn btn-success" style="margin-top: 1px;margin-right:10px;">
                            {{ __('Novo Produto') }}
                        </button>
                    </a>
                </div>
                <div class="card-body">

                    <table class="table  table-striped" id="table_products">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Data de Criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td> <a href='{{ route("products@destroy",$product->id)}}'><i class="fa-solid fa-trash"></i></a>
                                    <a href='{{ route("products@edit",$product->id)}}'><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#table_products').DataTable({
            searching: false,
        });

    });
</script>
@jquery
@toastr_js
@toastr_render
@endsection