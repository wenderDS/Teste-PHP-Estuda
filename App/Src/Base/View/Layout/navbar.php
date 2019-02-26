<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>/home/index">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?> >
                    <a href="http://<?php echo APP_HOST; ?>/home/index">Início</a>
                </li>
                <li <?php if($viewVar['nameController'] == "ClienteController") { ?> class="active" <?php } ?> >
                    <a href="http://<?php echo APP_HOST; ?>/cliente/index">Clientes</a>
                </li>
                <li <?php if($viewVar['nameController'] == "PedidoController") { ?> class="active" <?php } ?> >
                    <a href="http://<?php echo APP_HOST; ?>/pedido/index">Pedidos</a>
                </li>
                <li <?php if($viewVar['nameController'] == "ProdutoController") { ?> class="active" <?php } ?> >
                    <a href="http://<?php echo APP_HOST; ?>/produto/index">Produtos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>