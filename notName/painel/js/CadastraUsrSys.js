$("#btnCadastroUsr").click(function(event){


	if($("#btnCadastroUsr").val() == 1){
		if ($("#txtNomeUsr").val() != '' 
			&& $("#txtEmail").val() != '' 
			&& $("#txtLogin").val() != '' 
			&& $("#txtSenhaUsr").val() != ''
			&& $("#permissao").val() != '' 
			) 
		{

			$("#returnCadastroUsr").text("");
			$("#returnCadastroUsr").css("display","block");

			var data = $("#formUsrSys").serialize();
			$.ajax({

				type: 'POST',
				url: './../controller/controllerCadasUsrSys.php?action=insere',
				data: data,
				success: function(response){

					if (response == 'Inserido com sucesso') {

						$("#returnCadastroUsr").text("Cadastrado com sucesso");
						$("#returnCadastroUsr").addClass("text-success");

						setInterval(function(){
							$("#returnCadastroUsr").css("display","none");
							$("#txtNomeUsr").val("");
							$("#txtEmail").val("");
							$("#txtLogin").val("");
							$("#txtSenhaUsr").val("");
							$("#permissao").val("");
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
						},5000);
					}
				}
			});
		}	
		else{

			alert("Preencha tudo seu animal");
		}
	}else if($("#btnCadastroUsr").val() == 2){
		if ($("#txtNomeUsr").val() != '' 
			&& $("#txtEmail").val() != '' 
			&& $("#txtLogin").val() != '' 
			&& $("#txtSenhaUsr").val() != ''
			&& $("#permissao").val() != '') 
		{

			$("#returnCadastroUsr").text("");
			$("#returnCadastroUsr").css("display","block");

			var data = $("#formUsrSys").serialize();
			$.ajax({

				type: 'POST',
				url: './../controller/controllerCadasUsrSys.php?action=altera',
				data: data,
				success: function(response){
					alert(response);

					if (response == 'Alterado com sucesso') {

						$("#returnCadastroUsr").text("Alterado com sucesso");
						$("#returnCadastroUsr").addClass("text-success");

						setInterval(function(){
							$("#returnCadastroUsr").css("display","none");
							$("#txtNomeUsr").val("");
							$("#txtEmail").val("");
							$("#txtLogin").val("");
							$("#txtSenhaUsr").val("");
							$("#permissao").val(0);
						},5000);

					}else
					{
						$("#returnCadastroUsr").text("Não Foi possivel alterar");
						$("#returnCadastroUsr").addClass("text-danger");

						setInterval(function(){
							$("#returnCadastroUsr").css("display","none");
							$("#txtNomeUsr").val("");
							$("#txtEmail").val("");
							$("#txtLogin").val("");
							$("#txtSenhaUsr").val("");
							$("#permissao").val(0);
						},5000);
					}
				}
			});
		}	
		else{

			alert("Preencha tudo seu animal");
		}

	}

});

$("#btnCancel").click(function(event){
	$("#txtNomeUsr").val("");
	$("#txtEmail").val("");
	$("#txtLogin").val("");
	$("#txtSenhaUsr").val("");
	$("#permissao").val(0);
	$("#txtNomeUsr").focus();

	if($("#btnCadastroUsr").val() == 2){
		$("#btnCadastroUsr").val(1);
		$("#btnCadastroUsr").text('Cadastrar')
	}
	
});