<!-- src/views/anuidades.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuidades - Devs do RN</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Anuidades</h1>
    <a href="anuidade_create.php">Nova Anuidade</a>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Ano</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anuidades as $anuidade): ?>
                    <tr>
                        <td><?= htmlspecialchars($anuidade['ano']) ?></td>
                        <td>R$<?= htmlspecialchars($anuidade['valor']) ?></td>
                        <td><a href="anuidade_edit.php?id=<?= $anuidade['id'] ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
