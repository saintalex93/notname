$("#btnCarrinho").click(function(){
    carregando();

$.ajax({
    type: "POST",
    url: "./controller/abreVenda.php?md=" + $("#modeloId").val(),

    success: function (response) {

        alert(response);
        if (response == "Login"){
            $("#loginMoldal").modal();
        }

        else{

        }
        parar();
    }
});


});