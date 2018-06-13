function alteraTamanho(id){

	var rowTamanho = 'rowTamanho'+id;

	$("#idTamanho").val($('tr#'+rowTamanho+' td:nth-child(1)').text());
	$("#txtTamanho").val($('tr#'+rowTamanho+' td:nth-child(2)').text());
	$("#txtMedida").val($('tr#'+rowTamanho+' td:nth-child(3)').text());
	

	$("#btnCadastraTamanho").text("Alterar");
	$("#btnCadastraTamanho").val("2");
}