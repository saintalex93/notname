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
                alert("Infelizmente vendemos todo o estoque deste produto");
            }
            else{
                $("#itensCarrinho").text(response);
            }
        }
        parar();
    }
});


});