<?php

    $utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        $conexao = new PDO('mysql:host=localhost;dbname=rh;charset=utf8','root','',$utf8);

?>