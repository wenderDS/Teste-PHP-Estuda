<?php
    $scripts[] = 'http://' . APP_HOST . '/public/js/pedido.js';
?>
<div class="container">
    <div class="row">
        <?php foreach($viewVar['produtos'] as $produto): ?>
            <div class="col-sm-6 col-md-4 produto" data-produto="<?php echo $produto->getId(); ?>" data-valor="<?php echo $produto->getValor(); ?>">
                <div class="thumbnail">
                    <div class="caption">
                        <h3><?php echo $produto->getDescricao(); ?></h3>
                        <p>...</p>
                        <p>
                            <button class="btn btn-primary" type="button" data-action="buy">Comprar</button>
                            <input type="number" min="1" class="form-control" name="quantidade" value="1" style="width: 70px; display: inline-block;">
                            <button class="btn btn-default" type="button" data-action="add-to-cart">Adicionar ao carrinho</button>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>