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

                        <div class="row">
                            {{-- Editar --}}
                            <div>
                                <button title="Editar" class="btn btn-warning hover mx-2">
                                    <a class="acao" href='{{ url("/funcionarios/editar/$funcionario->id?r=0") }}'>
                                        <span class="iconify" data-icon="typcn:pencil" style="color: white;"></span>
                                    </a>
                                </button>
                            </div>
                            
                            {{-- Excluir --}}
                            <!-- Button trigger modal -->
                            <form action="{{ route('funcionariosLista', ['id' => $funcionario->id]) }}" method="POST">
                                @csrf
                                <button title="Excluir" type="submit" class="btn btn-danger hover" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <span class="iconify acao" data-icon="bxs:trash" style="color: white;"></span>
                                    </a>
                                </button>
                            </form>
                        </div>

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

    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
