<?php

    function validarPagina(){

        include_once Config::pathBase()."/models/Connect.php";
        include_once Config::pathBase()."/models/Manager.php";
        include_once Config::pathBase()."/models/LibHtml.php";

        if(!isset($_GET["pagina"])){
            return false;
        
        }

        switch ($_GET["pagina"]){

            case "listarProdutos":

                $titleSection = "Lista de Produtos";
                $lista = (new Manager)->select_common("produtos", null, null, null);

                $links [] = "<a class='btn btn-danger btn-sm'> 
                                <span class='iconify' data-icon='ph:trash-bold'></span> 
                            </a> ";

                $links [] = "<a class='btn btn-warning btn-sm'> 
                                <span class='iconify' data-icon='ph:pencil-bold'></span> 
                            </a> ";

                include_once Config::pathBase()."/views/modulos/produtos/list.php";

                // LibHtml::criarTabela($lista, ["class"=> "table table-hover table-bordered table-responsive"]);
                break;

            case "adicionarProduto":
                
                $titleSection = "Adicionar Produto";
                include_once Config::pathBase()."/views/modulos/produtos/adicionar.php";

                break;
            
            case "atualizarProduto":

                $data = (new Manager)->select_common("produtos", null, ["id"=>$_GET["id"]], null)[0];
            
                $titleSection = "Editar Produto";
                include_once Config::pathBase()."/views/modulos/produtos/atualizar.php";

                break;

        
            case "listarClientes":
                $titleSection = "Página de Usuários";
                $lista = (new Manager)->select_common("usuarios", null, null, null);

                $links [] = "<a class='btn btn-danger btn-sm'> 
                                <span class='iconify' data-icon='ph:trash-bold'></span> 
                            </a> ";

                $links [] = "<a class='btn btn-warning btn-sm'> 
                                <span class='iconify' data-icon='ph:pencil-bold'></span> 
                            </a> ";

                include_once Config::pathBase()."/views/modulos/usuarios/list.php";
                break;

            case "cadastrar":
                include_once Config::pathBase()."/views/register.php";
                break;


        }

    }

?>