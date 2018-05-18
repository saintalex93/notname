<!DOCTYPE html>
<html>
<head>
<title>Teste</title>
</head>
<body>

	<form action='./controller/inseremarcaController.php' method='GET'>
		<label>Nome: </label><input type='text' name='name'> <br>
		<br> <label>Status: </label><input type='number' name='statusMar'> <br>
		<br>
		<button type='submit'>Insere</button>
	</form>

	<form action='./controller/marcaController.php' method='POST'>
		<button>Buscar</button>
	</form>
<br>
	<form action='./controller/ClienteController.php' method='POST'>
		<input type="text" placeholder="Nome" name="nome" id="nome"> <br><br>
		<input type="email" placeholder="Email" name="email" id="email"> <br><br>
		<input type="password" placeholder="Senha" name="senha" id="senha"> <br><br>
		<button>Enviar</button>
		
	</form>
</body>
</html>