$("#btnCadastroUsr").click(function(event){
	$("#returnCadastroUsr").css("display", "none");


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
							window.location.reload();

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
							window.location.reload();

						},5000);
					}
				}
			});
		}	
		else{
				$("#returnCadastroUsr").text("Não Foi possivel cadastrar");
				$("#returnCadastroUsr").addClass("text-danger");

					setInterval(function(){
						$("#returnCadastroUsr").css("display","none");
					},5000);
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
							window.location.reload();

						},5000);
						
						$("#btnCadastroUsr").val(1);
						$("#btnCadastroUsr").text("Cadastrar");

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
							window.location.reload();

							
						},5000);
					}
				}
			});
		}	
		else{


			$("#returnCadastroUsr").text("Não Foi possivel cadastrar");
			$("#returnCadastroUsr").addClass("text-danger");

			setInterval(function () {
				$("#returnCadastroUsr").css("display", "none");
			}, 5000);
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