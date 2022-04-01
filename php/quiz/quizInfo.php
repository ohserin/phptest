<?php
    include "../connect/connect.php";

    $quizSubject = $_POST['quizSubject'];
    $sql = "SELECT * FROM myQuiz WHERE quizSubject = '$quizSubject' ORDER BY rand() LIMIT 1";

    $result = $connect -> query($sql);
    $quizInfo = $result -> fetch_array(MYSQLI_ASSOC);

    echo json_encode(array("quiz" => $quizInfo));
?>