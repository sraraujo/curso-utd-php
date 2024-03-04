<div class="container-fluid px-4">
  <div class="row">

    <div class="col-12">
      <h1 class="mt-4"><?= $titleSection; ?></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $titleSection; ?></li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          <?= $titleSection; ?>
        </div>
        <div class="card-body">


          <table class="table table-responsive table-bordered table-hover table-stripped" id="datatablesSimple">
            <thead class="text-center">
              <th>Id</th>
              <th>Nome</th>
              <th>Código</th>
              <th>Preço</th>
              <th>Estoque</th>
              <th>Ativo</th>
              <th>Cadastrado Em</th>
              <th>Ações</th>
            </thead>

            <tbody>
              <?php foreach ($lista as $l) : ?>

                <tr>
                  <td> <?= $l["id"];?> </td>
                  <td> <?= $l["nome"];?> </td>
                  <td> <?= $l["codigo"];?> </td>
                  <td> R$ <?= number_format($l["preco"], 2, ",", ".", );?> </td>
                  <td> <?= $l["estoque"];?> </td>
                  <td> <?= ($l["ativo"]) ? "Ativo": "Inativo";?> </td>
                  <td> <?= $l["cadastrado"];?> </td>

                  
                  <td>
                    <a title="Editar" href="?pagina=atualizarProduto&id=<?= $l["id"]; ?>" class="btn btn-sm btn-secondary">
                      <span class="iconify" data-icon="ph:pencil-bold"></span>
                    </a>

                    <button title="Excluir" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $l["id"]; ?>">
                      <span class="iconify" data-icon="ph:trash-bold"></span>
                    </button>
                  </td>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-<?= $l["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      
                      <form action="<?= Config::urlBase()?>/controllers/Produto.php" method="POST">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                              Excluir Produto
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <div class="modal-body">
                            Tem certeza que deseja excluir o produto
                            <strong><?= $l["nome"]; ?></strong>?
                          </div>

                          <input type="hidden" name="action" value="excluir">
                          <input type="hidden" name="id" value="<?= $l["id"]; ?>">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-danger">Sim, excluir! </button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </tr>
              <?php endforeach; ?>
            </tbody>
            
          </table>

          <!-- <?php LibHtml::criarTabela($lista, null, $links); ?> -->

          <!-- trechoque cria a tabela e passa os parametros de estilo junto
            <?php LibHtml::criarTabela($lista, ["class" => "table table-hover table-bordered table-striped", "id" => "datatablesSimple"]); ?>
           -->

        </div>
      </div>
    </div>

  </div>
</div>

<?php if (isset($_GET["msg"])):?>

<?php
  switch ($_GET["msg"]){

    case "delete-ok":
      echo "<script> alert(' Produto deletado com sucesso! ') </script>";
      break;
    
    case "insert-ok":
      echo "<script> alert(' Produto inserido com sucesso! ') </script>";
      break;
    
    case "edit-ok":
      echo "<script> alert(' Produto atualizado com sucesso! ') </script>";
      break;

  }  
?>
  
<?php endif;?>