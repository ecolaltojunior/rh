<?php
// Exportar dados para CSV com codificação UTF-8
if (isset($_POST['export_csv'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="dados.csv"');
    
    // Abra o arquivo de saída em modo de escrita
    $output = fopen('dados.csv', 'w');

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