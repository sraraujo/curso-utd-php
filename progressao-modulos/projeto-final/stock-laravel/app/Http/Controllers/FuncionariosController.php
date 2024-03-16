<?php

    namespace App\Http\Controllers;

    use App\Models\Funcionario;
    use Illuminate\Http\Request;


    class FuncionariosController extends Controller
    {
        public function inserir()
        {
            return view('funcionarios.inserir');
        }

        // adicionando um produto ao BD
        public function store(Request $request)
        {
            // dd($request->all());

            # salvando so dados no BD
            Funcionario::create ([
                'nome' => ucwords($request->nome),
                'cargo' => ucwords($request->cargo),
                'pagamento' => $request->pagamento,
                'admissao' => $request->admissao,
                'demissao' => $request->demissao,
                'ativo' => $request->ativo,
            ]);

            return redirect("funcionarios/novo ");
        }

        public function show($id)
        {
            $funcionario = Funcionario::findOrFail($id);
            return view("funcionarios.visualizar", ["funcionario" => $funcionario]);
        }

        public function edit($id)
        {
            $funcionario = Funcionario::findOrFail($id);
            return view("funcionarios.editar", ["funcionario" => $funcionario]);
        }

        public function update(Request $request, $id)
        {

            $funcionario = Funcionario::findOrfail($id);

            $funcionario->update([
                'nome' => ucwords($request->nome),
                'cargo' => $request->cargo,
                'pagamento' => $request->pagamento,
                'admissao' => $request->admissao,
                'demissao' => $request->demissao,
                'ativo' => $request->ativo,
                // "isDeleted" => $request->isDeleted,
            ]);

            return redirect("funcionarios/visualizar/{$id}");
            // return redirect("funcionarios/lista");
            
        }

        public function lista()
        {
            $funcionario = Funcionario::all();
            return view("funcionarios.lista", ["funcionarios" => $funcionario]);
        }

        public function delete($id)
        {
            $funcionario = Funcionario::findOrFail($id);
            $funcionario->destroy($id);
            return redirect("funcionarios/lista");
        }
    }
