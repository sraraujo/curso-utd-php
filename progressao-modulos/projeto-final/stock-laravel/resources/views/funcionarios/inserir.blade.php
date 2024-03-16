<style>
    .acao {
        color: white;
    }

    button:hover>.acao {
        color: white;
    }
</style>

@extends('adminlte::page')

@section('title', 'Novo Funcionarios')

@section('content_header')
    <h1 class="text-center"> Novo Funcionarios </h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Cadastrar Funcionarios
                </div>

                <div class="card-body">

                    <form action="{{ route('inserir_funcionario') }}" method="post">

                        <div class="row">

                            @csrf
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inome" class="form-label">
                                        <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                        Nome </label>
                                    <input type="text" class="form-control" name="nome" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inome" class="form-label">
                                        <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                        Cargo</label>
                                    <input type="text" class="form-control" name="cargo" id="internalCode" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inome" class="form-label">
                                        <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                        Pagamento / Descrição</label>
                                    <input type="text" class="form-control" name="pagamento" id="barCode" minlength="10" maxlength="40" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inome" class="form-label">
                                        <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                        Admissão</label>
                                    <input type="text" class="form-control" name="admissao" id="barCode" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inome" class="form-label">
                                        <span class="iconify" data-icon="wpf:name" style="color: #198754;"></span>
                                        Demissão</label>
                                    <input type="text" class="form-control" name="demissao" id="barCode">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="">Ativar ?</label>    
                                    <select class="form-control" name="ativo" id="">
                                        <option value="1" selected>Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="text-center">
                            <button class="btn btn-secondary mt-3 text-center mr-4"><a class="acao" href='{{ url("/funcionarios/lista") }}'>Voltar</a> </button>
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
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop