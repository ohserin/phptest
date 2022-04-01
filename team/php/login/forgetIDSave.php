<?php
include "../connect/connect.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
<?php
    include '../include/style.php';
?>
</head>
</head>
<body>
<?php
    include '../include/header.php';
?>

    <main id="main__login">
            <section id="loginBox" class="forgetIDBox">
                <div class="loginBox_img"></div>
                    <div class="loginBox_text">
                        <h4 class="forgetID">ID 찾기</h4>
<?php

    $youPhone = $_POST['youPhone'];
    $youBirth = $_POST['youBirth'];
    
    $youPhone = $connect -> real_escape_string($youPhone);
    $youBirth = $connect -> real_escape_string($youBirth);
    
    $searchString = "-";
    $replaceString = "";
    $originalString = $youPhone;
    
    $youPhone = str_replace($searchString, $replaceString, $originalString);

    $originalString = $youBirth;
    
    $youBirth = str_replace($searchString, $replaceString, $originalString);
    
    // echo $youPhone, $youBirth;

    $sql = "SELECT youPhone, youEmail, youBirth FROM myMember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    $findIDcount = $result -> num_rows;
    
    
    if($findIDcount > 0){
        $findID = $result -> fetch_array(MYSQLI_ASSOC);

        $sql = "SELECT youPhone, youEmail, youBirth FROM myMember WHERE youBirth = '$youBirth'";
        $result = $connect -> query($sql);
        $findIDcount = $result -> num_rows;
        if($findIDcount > 0){
            echo "<p class='findID'><span>".$findID['youEmail']."</span>입니다.</p>";
            echo "<a href='login.php' class='goLogin'>로그인 하러 가기</a>";
            echo "<a href='forgetPW.php' class='goLogin'>비밀번호 찾기</a>";
        } else {
            echo "<p class='findID'><span>일치하는 정보가 없습니다.</span></p>";
            echo "<a href='join.php' class='goLogin'>회원가입 하러 가기</a>";
        }
    } else {
        echo "<p class='findID'><span>일치하는 정보가 없습니다.</span></p>";
        echo "<a href='join.php' class='goLogin'>회원가입 하러 가기</a>";
    }
?>
                </div>
            </div>
        </section>

    </main>

</body>
</html>