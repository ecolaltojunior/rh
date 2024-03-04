<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Teste de perfil comportamental</title>
</head>
<body>
<div class="flex-container"> 
<?php 
    
    require ('conexao.php');
    $nome = $_POST['nome'];
    $faixa_etaria = $_POST['faixa_etaria'];
    $id_genero = $_POST['id_genero'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $semestre = $_POST['semestre'];
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
    echo '<h2>Seu perfil comportamental é: </h2>';
    echo "<p>Águia: " .$count_i *4; echo'%'; echo '</p>';
    echo "<p>Gato: " .$count_c *4; echo '%'; echo "</p>";
    echo "<p>Tubarão: " .$count_a *4; echo '%'; echo "</p>";
    echo "<p>Lobo: " .$count_o *4; echo'%'; echo "</p>";

    $cadastrar = 'insert into perfil (nome, faixa_etaria, id_genero, email, curso, periodo, i, c, a, o) values ("'.$nome.'", "'.$faixa_etaria.'", "'.$id_genero.'", "'.$email.'", "'.$curso.'", "'.$periodo.'", "'.$semestre.'","'.$count_i.'", "'.$count_c.'", "'.$count_a.'", "'.$count_o.'")';
    $inserir = $conexao->prepare($cadastrar);
    $inserir->execute();

    echo '<img src="resultado.png" alt="resultados perfil comportamental">';
    echo '<a class="link" href="index.html">Finalizar</a>';
?>
</div>
</body>
</html>