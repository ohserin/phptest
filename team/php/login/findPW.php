<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
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

<?php
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];

    // echo $youEmail, $youPass, $youPassC;

    if($youPass !== $youPassC){
        echo "<script>alert('비밀번호를 정확히 입력하세요.'); history.back(1);</script>";
        exit;
    } else {
        $sql = "UPDATE myMember SET youPass = '$youPass' WHERE youEmail = '$youEmail'";
        $connect -> query($sql);
    }
?>
    <main id="main__login">
        <section id="loginBox" class="forgetIDBox">
            <div class="loginBox_img"></div>
                <div class="loginBox_text">
                    <h4 class="forgetID">PW 변경 완료</h4>
                    <p class="forgetDesc mt50 mb50">새로운 비밀번호로 변경되었습니다.</p>
                    <a href='login.php' class='goLogin mt50'>로그인 하러 가기</a>
                </div>
            </div>
        </section>

    </main>
</body>
</html>