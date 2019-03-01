<div class="container">
    <div class="row">
        <div class="row" id="page-heading">
            <div class="col-xs-12 col-sm-6">
                <h1>Cliente > Inclusão</h1>
            </div>
        </div>

        <div class="panel">

            <form action="http://<?php echo APP_HOST; ?>/cliente/incluir" method="post" name="form_inclusao_cliente">
                <div class="panel-body">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dataNascimento" placeholder="Data de Nascimento" required>
                    </div>

                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name="genero" class="form-control" placeholder="Gênero">
                            <option value=""></option>
                            <?php foreach ($viewVar['listaGeneros'] as  $genero) { ?>
                                <option value="<?php echo $genero->getId(); ?>"><?php echo $genero->getNome(); ?></option>
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