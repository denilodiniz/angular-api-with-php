<?php

    include("connection.php");

    //Receb os dados no formato JSON da API
    $getData = file_get_contents("php://input");

    //Extrai os dados do formato JSON e armazena-os na variável
    $getDataCourse = json_decode($getData);

    //Separa os dados
    $idCourse = $getDataCourse->id;

    //Query sql para cadastrar
    $sql = "DELETE FROM courses WHERE id = '$idCourse'";
    mysqli_query($connection, $sql);

    mysqli_close($connection);

?>