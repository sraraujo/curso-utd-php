<?php

    namespace App\Http\Controllers;

    use App\Models\Produto;
    use Illuminate\Http\Request;


    class ProdutosController extends Controller
    {
        public function inserir()
        {
            return view('produtos.inserir');
        }

        // adicionando um produto ao BD
        public function store(Request $request)
        {
            // dd($request->all());

            # salvando so dados no BD
            Produto::create ([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'preco' => $request->preco,
                'estoque' => $request->estoque,
                'ativo' => $request->ativo,
            ]);

            return redirect("produtos/novo");
        }

        public function show($id)
        {
            $produto = Produto::findOrFail($id);
            return view("produtos.visualizar", ["produto" => $produto]);
        }

        public function edit($id)
        {
            $produto = Produto::findOrFail($id);
            return view("produtos.editar", ["produto" => $produto]);
        }

        public function update(Request $request, $id)
        {

            $produto = Produto::findOrfail($id);

            $produto->update([
                "nome" => $request->nome,
                "codigo" => $request->codigo,
                "preco" => $request->preco,
                "estoque" => $request->estoque,
                "ativo" => $request->ativo,
                // "isDeleted" => $request->isDeleted,
            ]);

            return redirect("produtos/visualizar/{$id}");
            
        }

        public function lista()
        {
            $produtos = Produto::all();
            return view("produtos.lista", ["produtos" => $produtos]);
        }

        public function delete($id)
        {
            $produto = Produto::findOrFail($id);
            $produto->destroy($id);
            return redirect("produtos/lista");
        }
    }
