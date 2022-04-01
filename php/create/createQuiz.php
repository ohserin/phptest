<?php

    include "../connect/connect.php";

    $sql = "CREATE TABLE myQuiz (";
    $sql .= "quizID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "memberID int(10) NOT NULL,";
    $sql .= "quizSubject varchar(20) NOT NULL,";
    $sql .= "quizAsk longtext NOT NULL,";
    $sql .= "quizDesc longtext DEFAULT NULL,";
    $sql .= "quizChoice1 longtext NOT NULL,";
    $sql .= "quizChoice2 longtext NOT NULL,";
    $sql .= "quizChoice3 longtext NOT NULL,";
    $sql .= "quizChoice4 longtext NOT NULL,";
    $sql .= "quizAnswer varchar(10) NOT NULL,";
    $sql .= "quizComment longtext DEFAULT NULL,";
    $sql .= "quizSource longtext DEFAULT NULL,";
    $sql .= "PRIMARY KEY (quizID)";
    $sql .= ")charset = utf8";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>