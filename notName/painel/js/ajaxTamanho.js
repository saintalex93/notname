$("#btnCadastraTamanho").click(function(event){
	if ($("#btnCadastraTamanho").val() ==1) {

		if ($("#txtTamanho").val() != ''
			&& $("#txtMedida").val() != '') {

		}
	}
	else if($("#btnCadastraTamanho").val() ==2){
		if ($("#txtTamanho").val() != ''
			&& $("#txtMedida").val() != '') {

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