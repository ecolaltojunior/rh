<?php 
    header("Content-Type: application/json");
    require ('conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $periodo = $_POST['periodo'];
    

   // $i = 
    //$c = 
    //$a = 
    //$o = 



    $cadastrar = 'insert into perfil (nome, email, curso, periodo, i, c, a, o) values ("'.$nome.'","'.$email.'", "'.$curso.'", "'.$periodo.'", "'.$i.'", "'.$c.'", "'.$a.'", "'.$o.'")';
    $inserir = $conexao->prepare($cadastrar);
    $inserir->execute();
?>