<?php
 include "../connect/connect.php";
 include "../connect/session.php";
 include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
 $youEmail = $_POST['youEmail'];
 $youNickName = $_POST['youNickName'];
 $youName = $_POST['youName'];
 $youBirth = $_POST['youBirth'];
 $youPhone = $_POST['youPhone'];
 $youIntro = $_POST['youIntro'];
 $youPass = $_POST['youPass'];
 $memberID = $_SESSION['memberID'];

//  echo $youEmail;
//  echo $youNickName;
//  echo $youName;
//  echo $youBirth;
//  echo $youPhone;
//  echo $youGender;
//  echo $youIntro;
//  echo $youSite;

echo $memberID;

 $sql = "SELECT youPass, memberID FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";

if($result){
     $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
        
    if($memberInfo['memberID'] == $memberID){
    //수정(쿼리문 작성)
    echo $memberInfo['memberID'];
        echo $memberID;

        $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youNickName = '{$youNickName}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}' WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        var_dump($result);
    echo "<script>alert('회원정보가 수정되었습니다.');</script>";
    }
} else {
    echo "실패";
}
    ?>

    <script>
        location.href = "myPage.php";
    </script>


</body>

</html>