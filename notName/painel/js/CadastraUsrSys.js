$("#btnCadastroUsr").click(function(event){
	
	if ($("#txtNomeUsr").val() != '' 
		&& $("#txtEmail").val() != '' 
		&& $("#txtLogin").val() != '' 
		&& $("#txtSenhaUsr").val() != ''
		&& $("#permissao").val() != '' 
		&& $("#statusUsuario").val() != '') 
	{

		$("#returnCadastroUsr").text("");
		$("#returnCadastroUsr").css("display","block");

		var data = $("#formUsrSys").serialize();

		$.ajax({

			type: 'POST',
			url: './../controller/controllerCadasUsrSys.php',
			data: data,
			success: function(response){

				var resposta = JSON.parse(response)
				if (resposta == 'Inserido com sucesso') {

					$("#returnCadastroUsr").text("Cadastrado com sucesso");
					$("#returnCadastroUsr").addClass("text-success");

					setInterval(function(){
						$("#returnCadastroUsr").css("display","none");
						$("#txtNomeUsr").val("");
						$("#txtEmail").val("");
						$("#txtLogin").val("");
						$("#txtSenhaUsr").val("");
						$("#permissao").val("");
						$("#statusUsuario").val("");
					},5000);

				}else
				{
					$("#returnCadastroUsr").text("Não Foi possivel cadastrar");
					$("#returnCadastroUsr").addClass("text-danger");

					setInterval(function(){
						$("#returnCadastroUsr").css("display","none");
						$("#txtNomeUsr").val("");
						$("#txtEmail").val("");
						$("#txtLogin").val("");
						$("#txtSenhaUsr").val("");
						$("#permissao").val("");
						$("#statusUsuario").val("");
					},5000);
				}
			}
		});
	}	
	else{

		alert("Preencha tudo seu animal");
	}

});