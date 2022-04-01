<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
<?php
        include "../connect/connect.php";
        include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];

    function msg($alert){
        echo "<p class'alert'>{$alert}</p>";
    }


    $sql = "SELECT memberID, youName, youEmail, youPass FROM myMember WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            msg("이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요!");
        } else {
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youName'] = $memberInfo['youName'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];

            Header("Location:../pages/main.php");
            
            echo "<pre>";
            var_dump($memberInfo);
            echo "</pre>";
        }
    }
    ?>
    
</body>
</html>