$(".pagamentoCX").click(function () {
    $(".pagamentoCX").each(function () {
        $(this).css("border", "1px solid rgba(0, 0, 0, 0.125)");
    });

    var id = this.id;
    id = id.substring(1, 10);
    document.getElementById(id).checked = true;
    $("#valorFrete").val(document.getElementsByClassName(id)[0].id);
    $("#frete").val(id);

    $(this).css("border", "3px solid #40b190");

});

$("#btnEntrega").click(function () {
    if ($("#valorFrete").val() != "" && $("#frete").val() != "") {
        var form = $('#formEntrega');

        carregando();

        $.ajax({
            type: "POST",
            url: './controller/controllerFrete.php?',
            data: form.serialize(),
            success: function (response) {
                if (response == "Done") {
                    location.href = 'checkout3.php';
                }
                else {
                    alert("Erro ao selecionar a forma de entrega. Tente novamente");
                    location.href = 'checkout2.php';
                }
                // parar();
            }
        });
    }
    else {
        alert("Selecione uma forma de entrega...");
    }
});




