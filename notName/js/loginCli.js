$("#logaCli").click(function(event) {
// alert("Apertou o botao");

	if ($("#emailLog").val() != '' && $("#senha").val() != '') {
		var data = $("#formLogCli").serialize();
// alert("vai entrar o ajax");
		$.ajax({
			type : 'POST',
			url : './controller/controllerCliente.php',
			data : data,
			success : function(response) {
				alert(response)
				if (response != "Erro") {
					window.location.href = './index.php';

				} else {
					alert("Cagou tudo");
					$("#returnFormLogCli").text("Usuario ou senha Invalidos");
					$("#returnFormLogCli").attr("class","text-center text-danger");
					
				}
			}
		});
	}
});
//essa merda vai ter que ser por classe. Usar esse script para o modal
$(".logaCli").click(function(event) {
	// alert("Apertou o botao");

		if ($(".emailLog").val() != '' && $(".senha").val() != '') {
			var data = $(".formLogCli").serialize();
	alert("vai entrar o ajax");
			$.ajax({
				type : 'POST',
				url : './controller/controllerCliente.php',
				data : data,
				success : function(response) {
					alert(response)
					if (response != "Erro") {
						window.location.href = './index.php';

					} else {
						// alert("Cagou tudo");
						$(".returnFormLogCli").text("Usuario ou senha Invalidos");
						$(".returnFormLogCli").attr("class","text-center text-danger");
						
					}
				}
			});
		}
	});