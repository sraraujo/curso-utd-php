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
              <th>Email</th>
              <th>Tipo de Acesso</th>
              <th>Ativo</th>
              <th>isDeleted</th>
              <th>loginAtual</th>
              <th>loginFim</th>
              <th>Cadastrado</th>
            </thead>
            
            <tbody>
              <?php foreach ($lista as $key => $dt) : ?>

                <tr>
                  <td><?= $dt["id"]; ?></td>
                  <td><?= $dt["nome"]; ?></td>
                  <td><?= $dt["email"]; ?></td>
                  <td><?= $dt["tipoAcesso"]; ?></td>
                  <td><?= ($dt["ativo"] ? "Sim" : "Não"); ?></td>
                  <td><?= $dt["isDeleted"]; ?></td>
                  <td><?= $dt["loginAtual"]; ?></td>
                  <td><?= $dt["loginFim"]; ?></td>
                  <td><?= $dt["cadastrado"]; ?></td>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-<?= $key; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="product.php" method="POST">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                              Excluir Produto
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Tem certeza que deseja excluir o produto
                            <strong><?= $dt[0]; ?></strong>?
                          </div>
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="<?= $key; ?>">
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
          <!-- <?php LibHtml::criarTabela($lista, ["class" => "table table-hover table-bordered table-striped", "id" => "datatablesSimple"]); ?> -->

        </div>
      </div>
    </div>

  </div>
</div>
