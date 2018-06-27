$("#btnAlteraDadosCliente").click(function(event){
	if (validaForm("#forDadosClie")){
	// carregando();

	var form = $('#forDadosClie').serialize();

	$.ajax( {
		type: "POST",
		url: './controller/controllerPainelCli.php?action=alteraDadoscli',
		data: form,
		success: function( response ) {
			if(response == 'Alterado')
			{
				$("#lblReturnCadCli").text("Alterado com sucesso");
				$("#lblReturnCadCli").addClass("text-success");

				setInterval(function(){
					$("#lblReturnCadCli").css("display","none");
					window.location.reload();
				},3000);
			}else
			{
				$("#lblReturnCadCli").text("Não foi possivel alterar");
				$("#lblReturnCadCli").addClass("text-danger");

				setInterval(function(){
					$("#lblReturnCadCli").css("display","none");
					window.location.reload();
				},3000);
			}
					// parar();
				}
			} );
}
else
{
	$("#lblReturnCadCli").text("Preencha todos os campos");
	$("#lblReturnCadCli").addClass("text-danger",);

	setInterval(function(){
		$("#lblReturnCadCli").css("display","none");
		window.location.reload();
	},3000);
}


});

$("#btnAlteraEndCliente").click(function(event){
	if (validaForm("#formEndCli")){
	// carregando();

	var form = $('#formEndCli').serialize();

	$.ajax( {
		type: "POST",
		url: './controller/controllerPainelCli.php?action=alteraEndcli',
		data: form,
		success: function( response ) {
			if(response == 'Alterado')
			{
				$("#lblReturnEndCli").text("Endereço alterado com sucesso");
				$("#lblReturnEndCli").addClass("text-success");

				setInterval(function(){
					$("#lblReturnEndCli").css("display","none");
					window.location.reload();
				},3000);
			}else
			{
				$("#lblReturnEndCli").text("Não foi possivel alterar o endereço");
				$("#lblReturnEndCli").addClass("text-danger");

				setInterval(function(){
					$("#lblReturnEndCli").css("display","none");
					window.location.reload();
				},3000);
			}

					// parar();
				}
			} );
}
else
{
	$("#lblReturnEndCli").text("Preencha todos os campos");
	$("#lblReturnEndCli").addClass("text-danger",);

	setInterval(function(){
		$("#lblReturnEndCli").css("display","none");
		window.location.reload();
	},3000);
}


});

$("#btnAlteraSenhaCliente").click(function(event){

	if ($("#novaSenha").val() == $("#senhaNova").val()){
	// carregando();

	var form = $('#formSenhaCli');

	$.ajax( {
		type: "POST",
		url: './controller/controllerPainelCli.php?action=alteraSenhacli',
		data: form.serialize(),
		success: function( response ) {
			if(response == 'Alterado')
			{
				$("#lblReturnSenhaCli").text("Senha alterada com sucesso");
				$("#lblReturnSenhaCli").addClass("text-success");

				setInterval(function(){
					$("#lblReturnSenhaCli").css("display","none");
					window.location.reload();
				},3000);
			}else
			{
				$("#lblReturnSenhaCli").text("Não foi possivel alterar a senha");
				$("#lblReturnSenhaCli").addClass("text-danger");

				setInterval(function(){
					$("#lblReturnSenhaCli").css("display","none");
					window.location.reload();
				},3000);
			}
					// parar();
				}
			} );
}else{

	$("#lblReturnSenhaCli").text("Senhas divergentes");
	$("#lblReturnSenhaCli").addClass("text-danger",);

	setInterval(function(){
		$("#lblReturnCadCli").css("display","none");
		window.location.reload();
	},5000);
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