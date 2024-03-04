<div class="container-fluid px-4">
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
            
            <!-- Conteúdo real da página -->
            <form action="<?= Config::urlBase();?>/controllers/Produto.php" method="POST" class="form-horizontal mt-4">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="wpf:name" style="color: #198754;"></span> Nome </label>
                            <input name="nome" type="text" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Cliente" value="<?=$data["nome"];?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="ic:twotone-email" style="color: #198754;"></span> Código </label>
                            <input name="codigo" type="text" class="form-control" maxlength="15" id="exampleFormControlInput1" placeholder1="Nome do Produto" value="<?=$data["codigo"];?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="fa6-solid:key" style="color: #198754;"></span> Preço </label>
                            <input name="preco" type="text" class="form-control" id="exampleFormControlInput1" placeholder1="Nome do Produto" value="<?=$data["preco"];?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="iconify" data-icon="fa6-solid:address-card" style="color: #198754;"></span> Estoque </label>
                            <input name="estoque" type="text" class="form-control cpf" id="exampleFormControlInput1" placeholder1="Nome do Produto" value="<?=$data["estoque"];?>">
                        </div>
                    </div>

                   <input type="hidden" name="ativo" value="1">
                   <input type="hidden" name="id" value="<?=$data["id"]?>">

                    <input type="hidden" name="action" value="update">

                    <div class="col-12 mt-3">
                        <p class="text-end">
                            <button type="submit" class="btn btn-outline-success">
                                <span class="iconify btn-outline-success" data-icon="material-symbols:save-sharp" style="color: #198754;"></span>
                                Salvar Dados
                            </button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
