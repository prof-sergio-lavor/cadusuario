<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
            <form action="salvar.php" method="post">
            <LABel>Nome</LABel>
            <input type="text" name="nome">
            <label>Email</label>
            <input type="email" name="email">
            <LABel>Senha</LABel>
            <input type="password" name="senha">
            <button>enviar</button>
            </form>

    </div>
</body>
</html>