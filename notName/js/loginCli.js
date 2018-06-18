$("#logaCli").click(function(event) 
{
	if ($("#emailLog").val() != '' && $("#senha").val() != '') 
	{
		
		var data = $("#formLogCli").serialize();

		$.ajax({
			type : 'POST',
			url : './controller/controllerCliente.php',
			data : data,
			success : function(response) {
				if (response == "Logado") {
					window.location.reload();
				} else {
					$("#returnFormLogCli").text("Usuario ou senha Invalidos");
					$("#returnFormLogCli").attr("class","text-center text-danger d-block mt-1");

				}
			}
		});
		
	}

});
//essa merda vai ter que ser por classe. Usar esse script para o modal
$(".logaCli").click(function(event) 
{	
	if ($(".emailLog").val() != '' && $(".senha").val() != '') {
		
		var data = $(".formLogCli").serialize();
		
		$.ajax({
			type : 'POST',
			url : './controller/controllerCliente.php',
			data : data,
			success : function(response) {
				if (response == "Logado") {
					window.location.reload();

				} else {

					$(".returnFormLogCli").text("Usuario ou senha Invalidos");
					$(".returnFormLogCli").attr("class","text-center text-danger d-block mt-1");

				}
			}
		});
		
	}
	
});