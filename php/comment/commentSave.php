<?php
    include "../connect/connect.php";

    $youName = $_POST['youName'];
    $youText = $_POST['youText'];
    $regTime = time();

    echo $youName, $youText, $regTime;

    //sql 작성 이름, 텍스트, 시간 -->query()

    $sql = "INSERT INTO myComment(youName, youText, regTime) VALUES('$youName', '$youText', '$regTime')";
        $result = $connect -> query($sql);

        // if($result){
        //     echo "INSERT INTO TRUE";
        // } else {
        //     echo "INSERT INTO FALES";
        // }

        Header("Location:../comment/comment.php#comment-type.");
?>

<script>


</script>