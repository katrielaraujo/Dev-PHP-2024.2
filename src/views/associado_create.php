<!-- src/views/associado_create.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Associado - Devs do RN</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Cadastrar Associado</h1>
    <form action="../controllers/AssociadoController.php?action=store" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required>

        <label for="data_filiacao">Data de Filiação:</label>
        <input type="date" name="data_filiacao" id="data_filiacao" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
