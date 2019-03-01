<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="http://<?php echo APP_HOST; ?>/produto/incluir" class="btn btn-success btn-sm">Adicionar</a>
            <hr>
        </div>
        <div class="col-sm-12">
            <?php
                if (!count($viewVar['listaProdutos'])) {
            ?>
                    <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
            <?php
                } else {
            ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="info">Descrição</th>
                                <th class="info">Valor</th>
                                <th class="info"></th>
                            </tr>
                        </thead>

                        <?php
                            foreach ($viewVar['listaProdutos'] as  $produto) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $produto->getDescricao(); ?></td>
                                    <td><?php echo $produto->getValor(); ?></td>
                                    <td style="width: 150px">
                                        <a href="http://<?php echo APP_HOST; ?>/produto/editar/<?php echo $produto->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                        <a href="http://<?php echo APP_HOST; ?>/produto/delete/<?php echo $produto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
