$("#logaCli").click(
		function(event){

			if($("#emailLog").val() != '' && $("#senha").val() !=''){
				var data = $("#formLogCli").serialize();

				$.ajax({
					type: 'POST',
					url: './controller/controllerCliente.php',
					data: data,
					success: function(response){
						if (response != "Erro"){
//							alert(response);
							window.location.href = './index.php';

						}
						else{
							
							alert("erro");
						}
					}
				});
			}
		}
);