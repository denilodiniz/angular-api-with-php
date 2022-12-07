<?php

    include("connection.php");

    //Receb os dados no formato JSON da API
    $getData = file_get_contents("php://input");

    //Extrai os dados do formato JSON e armazena-os na variável
    $getDataCourse = json_decode($getData);

    //Separa os dados
    $idCourse = $getDataCourse->$courses->id;
    $nameCourse = $getDataCourse->$courses->name;
    $courseValue = $getDataCourse->$courses->$course_value;

    //Query sql para cadastrar
    $sql = "UPDATE courses SET name = '$nameCourse', course_value = $courseValue WHERE id = $idCourse";
    mysqli_query($connection, $sql);

    //Exportar os dados cadastrados
    $course = [
        'nameCourse' => $nameCourse,
        'courseValue' => $courseValue   
    ]

    json_encode(['course'] => $course);

?>