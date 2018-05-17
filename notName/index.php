<!DOCTYPE html>
<html>
    <head>
        <title>Teste</title>
    </head>
    <body>

        <form action='./controller/inseremarcaController.php' method='GET'>
            <label>Nome: </label><input type='text'  name='name'> <br><br>
            <label>Status: </label><input type='number' name='statusMar'> <br><br>
            <button type='submit'>Insere</button>
        </form>

        <form action='./controller/marcaController.php' method='POST'>
            <button>Buscar</button>
        </form>
    </body>
</html>