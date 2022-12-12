<?php

    include("connection.php");

    //Recebe os dados no formato JSON da API
    $getData = file_get_contents("php://input");

    //Extrai os dados do formato JSON e armazena-os na variável
    $getDataCourse = json_decode($getData);

    //Separa os dados
    $idCourse = $getDataCourse->id;
    $nameCourse = $getDataCourse->name;
    $courseValue = $getDataCourse->course_value;

    //Query sql para cadastrar
    $sql = "UPDATE courses SET name = '$nameCourse', course_value = '$courseValue' WHERE id = '$idCourse'";
    mysqli_query($connection, $sql);

    //Exportar os dados cadastrados
    $course = [
        'nameCourse' => $nameCourse,
        'courseValue' => $courseValue   
    ]

    //json_encode(['course'] => $course);

    //mysqli_close($connection);

?>