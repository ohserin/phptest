<?php
$boardID = $_GET['boardID']; 

$sql = "UPDATE myBoard SET boardLike = boardLike + 1 WHERE boardID = {$boardID}";
$result = $connect -> query($sql);

var_dump($result);
?>