<?php

    //Váriaveis de acesso
    $url = "localhost";
    $user = "root";
    $password = "";
    $base = "angular_api";

    //Conexão com o Banco de Dados
    $connection = mysqli_connect($url, $user, $password, $base);

    //Organizar caracteres especiais
    mysqli_set_charset($connection,"utf8");

?>