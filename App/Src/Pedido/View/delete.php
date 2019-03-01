<div class="container">
    <div class="row">
        <div class="row" id="page-heading">
            <div class="col-xs-12 col-sm-6">
                <h1>Produto > Exclusão</h1>
            </div>
        </div>

        <div class="panel panel-danger">

            <form action="http://<?php echo APP_HOST; ?>/produto/delete" method="post" name="form_delete_produto">
                <div class="panel-body">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $viewVar['produto']->getId(); ?>">

                    Deseja realmente excluir produto: <?php echo $viewVar['produto']->getDescricao(); ?> ?

                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <a href="http://<?php echo APP_HOST; ?>/produto/index" class="btn btn-danger btn-rounded">Cancelar</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="submit" class="btn btn-success btn-rounded">Salvar</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>