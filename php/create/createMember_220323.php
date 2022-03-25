<?php
    include "../connect/connect.php";

    // CREATE TABLE myMember (
    //     memberID int(10) unsigned auto_increment,
    //     youEmail varchar(40) NOT NULL,
    //     youPass varchar(20) NOT NULL,
    //     youName varchar(20) NOT NULL,
    //     youBirth varchar(20) NOT NULL,
    //     youPhone varchar(20) NOT NULL,
    //     regTime int(20) NOT NULL,
    //     PRIMARY KEY (memberID)
    // ) charset=utf8;
    
    $sql = "CREATE TABLE myMember (";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>