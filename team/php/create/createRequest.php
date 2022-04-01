<?php
    include "../connect/connect.php";
 
    $sql = "CREATE TABLE myRequest (";
    $sql .= "requestID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "selectLayout varchar(10) NOT NULL,";
    $sql .= "requestTitle varchar(50) NOT NULL,";
    $sql .= "requestContents longtext NOT NULL,";
    $sql .= "requestPhoto varchar(50) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (requestID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>