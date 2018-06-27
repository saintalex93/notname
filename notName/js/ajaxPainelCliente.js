$("#btnAlteraDadosCliente").click(function(event){
if (validaForm("#forDadosClie")){
	// carregando();

			var form = $('#forDadosClie');

			$.ajax( {
				type: "POST",
				url: './controller/controllerPainelCli.php?action=alteraDadoscli',
				data: form.serialize(),
				success: function( response ) {
                    console.log(response);
					// parar();
				}
			} );
    }


});

$("#btnAlteraEndCliente").click(function(event){
if (validaForm("#formEndCli")){
	// carregando();

			var form = $('#formEndCli');

			$.ajax( {
				type: "POST",
				url: './controller/controllerPainelCli.php?action=alteraEndcli',
				data: form.serialize(),
				success: function( response ) {
                    console.log(response);
					// parar();
				}
			} );
    }


});

$("#btnAlteraSenhaCliente").click(function(event){
if (validaForm("#formSenhaCli")){
	// carregando();

			var form = $('#formSenhaCli');

			$.ajax( {
				type: "POST",
				url: './controller/controllerPainelCli.php?action=alteraSenhacli',
				data: form.serialize(),
				success: function( response ) {
                    console.log(response);
					// parar();
				}
			} );
    }


});

function validaForm(formId){
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