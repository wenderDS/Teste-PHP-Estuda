<div class="container">
    <div class="row">
        <div class="row" id="page-heading">
            <div class="col-xs-12 col-sm-6">
                <h1>Cliente > Edição</h1>
            </div>
        </div>

        <div class="panel">

            <form action="http://<?php echo APP_HOST; ?>/cliente/editar" method="post" name="form_edicao_cliente">
                <div class="panel-body">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $viewVar['cliente']->getId(); ?>">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $viewVar['cliente']->getNome(); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php echo $viewVar['cliente']->getTelefone(); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $viewVar['cliente']->getEmail(); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dataNascimento" placeholder="Data de Nascimento" value="<?php echo $viewVar['cliente']->getDataNascimento(); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name="genero" class="form-control">
                            <option value=""></option>
                            <?php foreach ($viewVar['listaGeneros'] as  $genero) { ?>
                                <option value="<?php echo $genero->getId(); ?>" <?php if ($genero->getId() == $viewVar['cliente']->getGenero()->getId()) {echo 'selected';} ?>><?php echo $genero->getNome(); ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <a href="http://<?php echo APP_HOST; ?>/cliente/index" class="btn btn-danger btn-rounded">Cancelar</a>
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