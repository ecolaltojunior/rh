<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Teste de perfil comportamental</title>
</head>
<body>
    
<?php 
    
    require ('conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $periodo = $_POST['periodo'];
    $count_i = 0;
    $count_c = 0;
    $count_o = 0;
    $count_a = 0;

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Loop através das perguntas de 1 a 25
    for ($i = 1; $i <= 25; $i++) {
        $fieldName = "pergunta{$i}";
        if (isset($_POST[$fieldName]) && in_array($_POST[$fieldName], array('i', 'c', 'o', 'a'))) {
            // Incrementar a variável de contagem correspondente ao valor selecionado
            ${"count_" . $_POST[$fieldName]}++;
        }
    }
}
    echo "<h1>Resultado:</h1>";
    echo '<p>Seu perfil comportamental é: </p>';
    echo "Águia: " .$count_i *4; echo'%'; echo '<br>';
    echo "Gato: " .$count_c *4; echo '%'; echo "<br>";
    echo "Tubarão: " .$count_a *4; echo '%'; echo "<br>";
    echo "Lobo: " .$count_o *4; echo'%'; echo "<br>";

    $cadastrar = 'insert into perfil (nome, email, curso, periodo, i, c, a, o) values ("'.$nome.'","'.$email.'", "'.$curso.'", "'.$periodo.'", "'.$count_i.'", "'.$count_c.'", "'.$count_a.'", "'.$count_o.'")';
    $inserir = $conexao->prepare($cadastrar);
    $inserir->execute();

    echo '<img src="Imagem1.png" alt="resultados perfil comportamental">'
?>
</body>
</html>