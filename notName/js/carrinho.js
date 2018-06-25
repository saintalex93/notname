$(".removeModelo").click(function(){
    
    carregando();

    $.ajax({
        type: "POST",
        url: "./controller/controllerCarrinho.php?ACTION=EXCLUDE&m_v_vm=" + $(this).attr('value'),
        success: function (response) {
            
            if (response == "APENAS UM MODELO"){
                alert("Não é possível excluir quando tem apenas um produto no carrinho");
            }

            else{
                location.reload();
            }

            parar();
        }
    });


});

$(".adicionaModelo").click(function () {
    carregando();

    $.ajax({
        type: "POST",
        url: "./controller/controllerCarrinho.php?ACTION=INCLUDE&m_v_vl=" + $(this).attr('value'),
        success: function (response) {
            if (response == "SEM ESTOQUE"){
                alert("Infelizmente esgotamos o nosso estoque deste modelo");
            }
            else{
                location.reload();
            }
            parar();
        }
    });

});

