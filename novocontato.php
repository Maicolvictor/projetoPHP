<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato</title>
    <link rel="stylesheet" href="styleform.css">
</head>
<body>
    <h1>Novo Contato</h1>
    <form action="?page=salvar-usuario" method="POST" onsubmit="return validarForm()">
        <input type="hidden" name="acao" value="cadastrar">
        <div> 
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div> 
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" required>
        </div>
        <div> 
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required>
        </div>
        <div> 
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div> 
            <button type="submit">Salvar</button>
        </div>
    </form>
    <script src="validation.js"></script>
</body>
</html>
