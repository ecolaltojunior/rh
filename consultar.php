<?php
        require('conexao.php');
        // Consulta SQL
        $sql = "SELECT * FROM perfil";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        // Exportar dados para CSV com codificação UTF-8
    if (isset($_POST['export_csv'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="dados.csv"');
    
    // Abra o arquivo de saída em modo de escrita
    $output = fopen('php://output', 'w');

    // Cabeçalho das colunas
    $header = [];
    for ($i = 0; $i < $stmt->columnCount(); $i++) {
        $column = $stmt->getColumnMeta($i);
        $header[] = utf8_encode($column['name']);
    }
    fputcsv($output, $header);

    // Dados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Remover tags HTML dos valores
        $row = array_map('strip_tags', $row);
        $row = array_map('utf8_encode', $row); // Converter todos os valores para UTF-8
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
}
    ?>
    


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Respostas</title>
</head>
<body>
  

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>E-Mail</th>
            <th>Curso</th>
            <th>Período</th>
            <th>i</th>
            <th>c</th>
            <th>a</th>
            <th>o</th>

        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['curso'] . "</td>";
            echo "<td>" . $row['periodo'] . "</td>";
            echo "<td>" . $row['i'] . "</td>";
            echo "<td>" . $row['c'] . "</td>";
            echo "<td>" . $row['a'] . "</td>";
            echo "<td>" . $row['o'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form method="post">
        <button type="submit" name="export_csv">Salvar em Excel</button>
    </form>
  
</body>
</html>
