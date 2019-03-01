<div class="container">
    <div class="row">
        <div class="col-sm-12 text-right">
            <a href="http://<?php echo APP_HOST; ?>/cliente/incluir" class="btn btn-success btn-sm">Adicionar</a>
            <hr>
        </div>
        <div class="col-sm-12">
            <?php
                if (!count($viewVar['listaClientes'])) {
            ?>
                    <div class="alert alert-info" role="alert">Nenhum cliente encontrado</div>
            <?php
                } else {
            ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="info">Nome</th>
                                <th class="info">E-mail</th>
                                <th class="info"></th>
                            </tr>
                        </thead>

                        <?php
                            foreach ($viewVar['listaClientes'] as  $cliente) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $cliente->getNome(); ?></td>
                                    <td><?php echo $cliente->getEmail(); ?></td>
                                    <td style="width: 150px">
                                        <a href="http://<?php echo APP_HOST; ?>/cliente/editar/<?php echo $cliente->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                        <a href="http://<?php echo APP_HOST; ?>/cliente/delete/<?php echo $cliente->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
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
