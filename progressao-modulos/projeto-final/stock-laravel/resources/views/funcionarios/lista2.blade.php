<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Produtos</title>
    <!-- Links de estilo -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
        <h1>Lista de Produtos</h1>

        <hr>
            <a href='{{ url("produtos/novo") }}'> Inserir Novo Produto</a>
        <hr>

        <table border="2" cellspacing="2" cellpadding="4" class="table table-bordered table-hover table-striped" id="myTable">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ativo ?</th>
                    <th>Ações</th>
                </tr>
            </thead>
                
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td> {{ $produto->id }} </td>
                        <td> {{ $produto->nome }} </td>
                        <td> {{ $produto->codigo }} </td>
                        <td> R$ {{ $produto->preco }} </td>
                        <td> {{ $produto->estoque }} </td>
                        <td> {{ $produto->ativo }} </td>
                        
                        <td>
                            <button><a href='{{ url("/produtos/visualizar/$produto->id") }}'> Ver </a></button>
                            <button><a href='{{ url("/produtos/editar/$produto->id") }}'> Editar </a></button>
                            <button><a href='{{ url("produtos/excluir/$produto->id") }}'> Ecluir </a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        let table = new DataTable('#myTable');
    </script>
    
</body>
</html>