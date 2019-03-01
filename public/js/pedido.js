$(function()  {
    $('[data-action=add-to-cart]').click(function()  {
        var produto = $(this).parents('.produto');
        var data = produto.data();
        data.quantidade = $('input[name=quantidade]', produto).val();

        $.ajax({
            url: BASE_URL + '/pedido/addproduto',
            type: 'POST',
            dataType: 'json',
            data: {'produto' : data },
            beforeSend: function()  {
                loading(true);
            },
            complete: function(XMLHttpRequest) {
                loading(false);

                var res = XMLHttpRequest.responseJSON;

                if(res.success) {
                    //Mensagem de sucesso
                } else  {
                    //Mensagem de erro
                }
            }
        })
    })
});