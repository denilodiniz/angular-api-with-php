<?php

    //Incluindo o arquivo responsável pela conexão
    include("connection.php");


    //Query nativa do SQL
    $sql = "SELECT * FROM courses";

    //Executa a query e armaneza os dadno na varipavel $execute
    $execute = mysqli_query($connection, $sql);

    
    $courses = [];
    $i = 0;

    while($line = mysqli_fetch_assoc($execute)) {
        $courses[$i]['id'] = $line['id'];
        $courses[$i]['name'] = $line['name'];
        $courses[$i]['course_value'] = $line['course_value'];

        $i++;
    }

    json_encode(['courses'=>$courses]);

    var_dump($courses);
?>

