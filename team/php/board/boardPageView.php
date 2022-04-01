<?php
    $sql = "SELECT count(boardID) FROM myBoard";
    $result = $connect -> query($sql);

    $boardID_Array = $result -> fetch_array(MYSQLI_ASSOC);
    $boardID_Count = $boardID_Array['count(boardID)'];

    
?>