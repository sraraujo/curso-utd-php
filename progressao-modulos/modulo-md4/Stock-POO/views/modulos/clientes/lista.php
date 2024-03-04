<?php
    
    //  lista vem do ProdutoController
    $data = $lista;

    $titulos = array_keys($data);
?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <?php foreach ($titulos as $titulo): ?>
                            <th> <?= $titulo; ?> </th>
                        <?php endforeach; ?>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data as $linha):?>
                        <tr>

                            <?php foreach ($titulos as $titulo): ?>
                                <td> <?= $linha[$titulo]; ?> </td>
                            <?php endforeach; ?>
                                                
                            <td>
                                <a href="deletar.php?id=<?= $linha['id'];?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>