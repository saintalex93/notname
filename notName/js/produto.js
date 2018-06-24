$("#btnCarrinho").click(function(){
    carregando();

$.ajax({
    type: "POST",
    url: "./controller/abreVenda.php?md=" + $("#modeloId").val(),

    success: function (response) {

        if (response == "Login"){
            $("#loginMoldal").modal();
        }

        else{
            if (response == "SEM ESTOQUE"){

            }
            else{
                $("#itensCarrinho").text(response);
            }
        }
        parar();
    }
});


});