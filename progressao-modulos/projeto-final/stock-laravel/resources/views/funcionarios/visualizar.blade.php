<style>
    button:hover > .acao{
        color: white;
    }
</style>

@extends('adminlte::page')

@section('title', 'Informações do Funcionário')

@section('content_header')
    <h1 class="text-center">Informações do Funcionário</h1>
@stop

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        Funcionário  - {{ $funcionario->nome }}    
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped mt-3">
                            <tbody>
                                <tr>
                                    <th>Nome</th><td> {{ $funcionario->nome }} </td>
                                </tr>
                                <tr>
                                    <th>Cargo</th><td> {{ $funcionario->cargo }} </td>
                                </tr>
                                <tr>
                                    <th>Pagamento</th><td> R$ {{ $funcionario->pagamento }} </td>
                                </tr>
                                <tr>
                                    <th>Admissão</th><td> {{ $funcionario->admissao }} </td>
                                </tr>
                                <tr>
                                    <th>Demissão</th><td> {{ ($funcionario->demissao == null) ? "Inexistente" : "$funcionario->demissao" }} </td>
                                </tr>
                                <tr>
                                    <th>Ativo ?</th><td> {{ ($funcionario->ativo) ? "Sim" : "Não" }} </td>
                                </tr>
                                <tr>
                                    <th>Deletado ?</th><td> {{ ($funcionario->isDeleted == null) ? "Não" : "Sim" }} </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-outline-primary mt-3 text-center"><a class="acao" href='{{ url("/funcionarios/lista") }}'>Voltar</a> </button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
