<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Produto</title>
</head>
<body>

    <form action=" {{ route('excluir_produto', ['id' => $produto->id]) }}" method="POST">

        @csrf
        <h1>tem certeza que deseja exlcuir o produto {{ $produto->nome }}</h1>

        <button type="submit">Sim, excluir!</button>
        <button> <a href='{{ url("/produtos/lista") }}'>Voltar</a> </button>

    </form>
    
</body>
</html>