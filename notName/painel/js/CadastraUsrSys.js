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
				alert(response);
			}
		});
	}	
	else{

		alert("Preencha tudo seu animal");
	}

});