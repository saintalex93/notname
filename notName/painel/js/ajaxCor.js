$("#btnCadastraCor").click(function(event){
	if ($("#btnCadastraCor").val() == 1) {
		
		if($("#txtDescCor").val() != '' 
			&& $("#txtCor").val() != '')
		{
			$("#returnCadCor").text("");
			$("#returnCadCor").css("display","block");

			var data = $("#formCor").serialize();

			$.ajax({
				type: 'POST',
				url: './../controller/controllerCor.php?action=insere',
				data: data,
				success: function(response){
					if (response == 'Inserido com sucesso') {

						$("#returnCadCor").text("Cadastrado com sucesso");
						$("#returnCadCor").addClass("text-success");

						setInterval(function(){
							$("#returnCadCor").css("display","none");
							$("#txtDescCor").val("");
							$("#txtCor").val("");
							$("#html5colorpicker").val("");
							window.location.reload();							
						},3000);

					}else
					{
						$("#returnCadCor").text("Não Foi possivel cadastrar");
						$("#returnCadCor").addClass("text-danger");

						setInterval(function(){
							$("#returnCadCor").css("display","none");
							$("#txtDescCor").val("");
							$("#txtCor").val("");
							$("#html5colorpicker").val("#ff0000");
							window.location.reload();
						},3000);
					}

				}
			});
		}

	}else if($("#btnCadastraCor").val() == 2){
		
		if($("#txtDescCor").val() != '' 
			&& $("#txtCor").val() != '')
		{
			$("#returnCadCor").text("");
			$("#returnCadCor").css("display","block");

			var data = $("#formCor").serialize();

			$.ajax({
				type: 'POST',
				url: './../controller/controllerCor.php?action=altera',
				data: data,
				success: function(response){

					if (response == 'Alterado com sucesso') {

						$("#returnCadCor").text("Alterado com sucesso");
						$("#returnCadCor").addClass("text-success");

						setInterval(function(){
							$("#returnCadCor").css("display","none");
							$("#txtDescCor").val("");
							$("#txtCor").val("");
							$("#html5colorpicker").val("");
							window.location.reload();							
						},3000);

					}else
					{
						$("#returnCadCor").text("Não Foi possivel alterar");
						$("#returnCadCor").addClass("text-danger");

						setInterval(function(){
							$("#returnCadCor").css("display","none");
							$("#txtDescCor").val("");
							$("#txtCor").val("");
							$("#html5colorpicker").val("#ff0000");
							window.location.reload();
						},3000);
					}

				}
			});
		}

	}
	else{
		alert("Algo deu muito errado");
	}

});

$("#btnCancelCor").click(function(event){
	$("#idCor").val("");
	$("#txtDescCor").val("");
	$("#txtCor").val("");
	$("#html5colorpicker").val("#ff0000");
	$("#txtDescCor").focus();

	if($("#btnCadastraCor").val() == 2){
		$("#btnCadastraCor").val(1);
		$("#btnCadastraCor").text('Cadastrar')
	}
});