<?php

    //Incluindo o arquivo responsável pela conexão
    include("connection.php");


    //Query nativa do SQL
    $sql = "SELECT * FROM courses";

    //Executa a query e armaneza os dados na variável $execute
    $execute = mysqli_query($connection, $sql);

    
    $courses = [];
    $i = 0;

    while($line = mysqli_fetch_assoc($execute)) {
        $courses[$i]['id'] = $line['id'];
        $courses[$i]['name'] = $line['name'];
        $courses[$i]['value'] = $line['course_value'];

        $i++;
    }

    echo json_encode(['courses'=>$courses]);

    //header('Content-Type: application/json');

    //var_dump($courses);

    mysqli_close($connection);
?>

