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
    <title>회원 정보</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
    <?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>
                
                
                        <div class="join-intro">
                            <div class="face">
                            <img src="../assets/img/mypage/default.svg" alt="기본이미지">
                            </div>
                            <div class="intro">나무에 관심이 적은 오세린 입니다.</div>
                        </div>
                        <div class="join-info">
                            <ul>
                                <li>
                                    <strong>이메일</strong>
                                    <span>a@naver.com</span>
                                </li>
                            </ul>
                        </div>

                        <div class="join-btn">
                            <a href="mypageModify.php">수정하기</a>
                            <a href="mypageRemove.php">탈퇴하기</a>
                        </div>
            </div>
        </section>
    </main>
    <!-- //main -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>