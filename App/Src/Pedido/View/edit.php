<div class="container">
    <div class="row">
        <div class="row" id="page-heading">
            <div class="col-xs-12 col-sm-6">
                <h1>Produto > Edição</h1>
            </div>
        </div>

        <div class="panel">

            <form action="http://<?php echo APP_HOST; ?>/produto/editar" method="post" name="form_edicao_produto">
                <div class="panel-body">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $viewVar['produto']->getId(); ?>">

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="descricao" placeholder="" value="<?php echo $viewVar['produto']->getDescricao(); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="" value="<?php echo $viewVar['produto']->getValor(); ?>" required>
                    </div>

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