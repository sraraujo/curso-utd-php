<style>
    button:hover > .acao{
        color: white;
    }
</style>

@extends('adminlte::page')

@section('title', 'Lista de Funcionários')

@section('content_header')
    <h1>Lista de Funcionários</h1>
@stop

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">

                <!-- <div class="my-4">
                    <a href='{{ url("produtos/novo") }}'> + Novo Produto</a>
                </div> -->

                <table class="table table-bordered table-hover table-striped" id="myTable">

                    <thead>
                        <tr class="bg-primary">
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Pagamento</th>
                            <th>Admissão</th>
                            <th>Demissão</th>
                            <th>Ativo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td> {{ $funcionario->id }} </td>
                                <td> {{ $funcionario->nome }} </td>
                                <td> {{ $funcionario->cargo }} </td>
                                <td> R$ {{ $funcionario->pagamento }} </td>
                                <td> {{ $funcionario->admissao }} </td>
                                <td> {{ ($funcionario->demissao == null) ? "Inexistente" : "$funcionario->demissao" }} </td>
                                <td> {{ ($funcionario->ativo) ? "Sim" : "Não" }} </td>
                                
                                <td class="text-center">

                                    {{-- Visualizar --}}
                                    <button title="Visualizar" class="btn btn-success hover">
                                        <a class="acao" href='{{ url("/funcionarios/visualizar/$funcionario->id") }}'> 
                                            <span class="iconify" data-icon="mdi:eye" style="color: white;"></span>    
                                        </a>
                                    </button>

                                    {{-- VisuaEditarlizar --}}
                                    <button title="Editar" class="btn btn-warning hover mx-2">
                                        <a class="acao" href='{{ url("/funcionarios/editar/$funcionario->id") }}'>
                                            <span class="iconify" data-icon="typcn:pencil" style="color: white;"></span>    
                                        </a>
                                    </button>
                                            

                                    {{-- Excluir --}}
                                    <!-- Button trigger modal -->
                                    <button title="Excluir" type="button" class="btn btn-danger hover" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <span class="iconify acao" data-icon="bxs:trash" style="color: white;"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="staticBackdropLabel">Excluir funcionário!</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Deseja excluir o funcionário <strong>{{ $funcionario->nome}}</strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                    
                                                    <form action=" {{ route('funcionariosLista', ['id' => $funcionario->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger text-white">Sim, Excluir!</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

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
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        let table = new DataTable('#myTable');
    </script>
@stop