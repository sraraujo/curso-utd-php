<style>
    .acao{
        color: white;
    }
    button:hover > .acao{
        color: white;
    }
</style>

@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1 class="text-center">Funcionário - {{ $funcionario->nome }}</h1>
@stop

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Editar Funcionário
                    </div>

                    <div class="card-body">

                        <form action="{{ route('editar_funcionario', ['id' => $funcionario->id]) }}" method="post">

                            <div class="row">

                                @csrf
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="inome" class="form-label">
                                            <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                            Nome </label>
                                        <input type="text" class="form-control" name="nome" maxlength="60" required value="{{ $funcionario->nome }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="inome" class="form-label">
                                            <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                            Cargo</label>
                                        <input type="text" class="form-control" name="cargo" id="internalCode" required value="{{ $funcionario->cargo }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="inome" class="form-label">
                                            <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                            Pagamento Descrição</label>
                                        <input type="text" class="form-control" name="pagamento" id="barCode" maxlength="40" required value="{{ $funcionario->pagamento }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="inome" class="form-label">
                                            <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                            Data Admissão</label>
                                        <input type="text" class="form-control" name="admissao" id="barCode" maxlength="10" required value="{{ $funcionario->admissao }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="inome" class="form-label">
                                            <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                            Data Demissão</label>
                                        <input type="text" class="form-control" name="demissao" id="barCode" maxlength="10"  value="{{ $funcionario->demissao }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Ativo ?</label>    
                                        <select class="form-control" name="ativo" id="">
                                            <option <?= ($funcionario->ativo) ? "selected" : "" ?> value="1">Sim</option>
                                            <option <?= (!$funcionario->ativo) ? "selected" : "" ?> value="0">Não</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="text-center">
                                <button class="btn btn-success mt-3 text-center mr-4"><a class="acao" href='{{ url("/funcionarios/lista") }}'>Home</a> </button>

                                <?php if ( $_GET): ?>
                                    <button class="btn btn-secondary mt-3 text-center mr-4">
                                        <a class="acao" href='{{ url("/funcionarios/visualizar/$funcionario->id") }}'>Visualizar</a>
                                    </button>
                                <?php endif; ?>

                                <button class="btn btn-primary mt-3 text-center" type="submit">Salvar</button>
                            </div>

                        </form>
                    </div>
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
