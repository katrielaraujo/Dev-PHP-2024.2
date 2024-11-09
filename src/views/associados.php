<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associados - Devs do RN</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Associados</h1>
    <a href="index.php?rota=associado/cadastrar">Novo Associado</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data de Filiação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associados as $associado): ?>
            <tr>
                <td><?= htmlspecialchars($associado['nome']) ?></td>
                <td><?= htmlspecialchars($associado['email']) ?></td>
                <td><?= htmlspecialchars($associado['cpf']) ?></td>
                <td><?= htmlspecialchars($associado['data_filiacao']) ?></td>
                <td>
                    <a href="index.php?rota=anuidade/pagar&id=<?= $associado['id'] ?>">Cobrança</a>
                    <a href="index.php?rota=associado/excluir&id=<?= $associado['id'] ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
