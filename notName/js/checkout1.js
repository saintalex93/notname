function fnCep(cep) {

    cep = cep.replace(".", "").replace("-", "");

    var oPagina = new XMLHttpRequest();

    with (oPagina) {
        open('GET', "https://viacep.com.br/ws/" + cep + "/json/");

        send();

        onload = function () {
            var oDados = JSON.parse(responseText);

            document.all.txtEndereco.value = oDados.logradouro;
            document.all.txtCidade.value = oDados.localidade;
            document.all.txtBairro.value = oDados.bairro;
            document.all.cmbUf.value = oDados.uf;

            document.all.txtNumero.focus();


        }

    }

}


$("#btnCliEnd").click(function (){

    if (validaForm("#formCliEnd")){
	carregando();

			var form = $('#formCliEnd');

			$.ajax( {
				type: "POST",
				url: './controller/controllerCliEnd.php',
				data: form.serialize(),
				success: function( response ) {
                    console.log(response);
                    location.href='checkout2.php';
					// parar();
				}
			} );
    }
		
});


function validaForm(idForm){
    var formId = idForm;
    var result = true;

    $(formId + " input[type=text]").each(function () {
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).focus();
            result = false;
        }
        else {
            $(this).css("border", "1px solid #ced4da");
        }
    });
    $(formId + " input[type=date]").each(function () {
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).focus();
            result = false;
        }
        else {
            $(this).css("border", "1px solid #ced4da");
        }
    });
    $(formId + " input[type=tel]").each(function () {
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).focus();
            result = false;
        }
        else {
            $(this).css("border", "1px solid #ced4da");
        }
    });
    $(formId + " input[type=email]").each(function () {
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).focus();
            result = false;
        }
        else {
            $(this).css("border", "1px solid #ced4da");
        }
    });
    $(formId + " select").each(function () {
        if ($(this).val() == "") {
            $(this).css("border", "1px solid red");
            $(this).focus();
            result = false;
        }
        else {
            $(this).css("border", "1px solid #ced4da");
        }
    });

    return result;
}