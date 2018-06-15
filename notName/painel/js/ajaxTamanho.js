$("#btnCadastraTamanho").click(function(event){
	if ($("#btnCadastraTamanho").val() ==1) 
	{

		if ($("#txtTamanho").val() != ''
			&& $("#txtMedida").val() != '') 
		{

			$("#returnCadTamanho").text("");
			$("#returnCadTamanho").css("display","block");

			var data = $("#formTamanho").serialize();

			$.ajax({
				type: 'POST',
				url: './../controller/controllerTamanho.php?action=insere',
				data: data,
				success: function(response){
					if(response == 'Inserido com sucesso')
					{
						$("#returnCadTamanho").text("Cadastrado com sucesso");
						$("#returnCadTamanho").addClass("text-success");

						setInterval(function(){
							$("#returnCadTamanho").css("display","none");
							$("#txtTamanho").val("");
							$("#txtMedida").val("");

						},5000);
					}
				}
			});
		}
	}
	else if($("#btnCadastraTamanho").val() ==2)
	{

		if ($("#txtTamanho").val() != ''
			&& $("#txtMedida").val() != '') 
		{
			$("#returnCadTamanho").text("");
			$("#returnCadTamanho").css("display","block");

			var data = $("#formTamanho").serialize();

			$.ajax({
				type: 'POST',
				url: './../controller/controllerTamanho.php?action=altera',
				data: data,
				success: function(response){
					if(response == 'Alterado com sucesso')
					{
						$("#returnCadTamanho").text("Alterado com sucesso");
						$("#returnCadTamanho").addClass("text-success");

						setInterval(function(){
							$("#returnCadTamanho").css("display","none");
							$("#txtTamanho").val("");
							$("#txtMedida").val("");

						},5000);
					}
				}
			});
		}
	}
	else{
		alert("Algo deu errado");
	}

});


$("#btnCacelarTamanho").click(function(event){
	$("#txtTamanho").val("");
	$("#txtMedida").val("");
	$("#txtTamanho").focus();

	if($("#btnCadastraTamanho").val() == 2){
		$("#btnCadastraTamanho").val(1);
		$("#btnCadastraTamanho").text('Cadastrar')
	}
});