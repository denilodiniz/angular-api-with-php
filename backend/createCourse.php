<?php

    include("connection.php");

    //Receb os dados no formato JSON da API
    $getData = file_get_contents("php://input");

    //Extrai os dados do formato JSON e armazena-os na variável
    $getDataCourse = json_decode($getData);

    //Separa os dados
    $nameCourse = $getDataCourse->$courses->name;
    $courseValue = $getDataCourse->$courses->$course_value;

    //Query sql para cadastrar
    $sql = "INSERT INTO courses (name, course_value) VALUES ('$nameCourse', $courseValue)";
    mysqli_query($connection, $sql);

    //Exportar os dados cadastrados
    $course = [
        'id' => $idCourse,
        'name' => $nameCourse,
        'course_value' => $courseValue   
    ]

    json_encode(['course'] => $course);

?>