$("#btnCadastroUsr").click(function(event){
	
	if ($("#txtNomeUsr").val() != '' 
		&& $("#txtEmail").val() != '' 
		&& $("#txtLogin").val() != '' 
		&& $("#txtSenhaUsr").val() != '' 
		&& $("#permissao").val() != '' 
		&& $("#statusUsuario").val() != '') 
	{

		var data = $("#formUsrSys").serialize();

		$.ajax({

			type: 'POST',
			url: './../controller/controllerCadasUsrSys.php',
			data: data,
			success: function(response){

				var resposta = JSON.parse(response)
				if (resposta == 'Inserido com sucesso') {

					alert(response);
					$("#returnCadastroUsr").text("Cadastrado com sucesso");
					$("#returnCadastroUsr").addClass("text-success");


				}else
				{

				}
			}
		});
	}	
	else{

		alert("Preencha tudo seu animal");
	}

});