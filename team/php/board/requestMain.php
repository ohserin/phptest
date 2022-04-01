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
    <title>문의하기</title>
    <?php
    include '../include/headerblue.php';
?>
<style>
    body {
        background: #fff;
    }
</style>
</head>
<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->

<main id="main">
        <section id="boardQuest">
            <div class="boardQuest__head">
                <div class="container">
                    <h3>개인소장, 다양한 행사에 맞는<br>웹 앨범이 필요하신가요?</h3>
                </div>
            </div>
            <div class="boardQuest__body">
                <div class="container mt50">
                    <div class="desc">
                        <article class="article1">
                            <h4>가족들과 함께</h4>
                        </article>
                        <article class="article2">
                            <h4>애완동물과 함께</h4>
                        </article>
                        <article class="article3">
                            <h4>행사 취지에 맞게</h4>
                        </article>
                    </div>
                    <div class="process">
                        <h3>이제, PICS 웹 앨범으로 한번에 해결하세요!</h3>
                        <div class="steps">
                            <div class="step1 step">
                                <img src="../../html/assets/img/request/ask.svg" alt="의뢰하기">
                                <p>의뢰하기</p>
                            </div>
                            <div class="step2 step">
                                <img src="../../html/assets/img/request/cart.svg" alt="확인 및 결제">
                                <p>확인 및 결제</p>
                            </div>
                            <div class="step3 step">
                                <img src="../../html/assets/img/request/picture.svg" alt="사진 전송">
                                <p>사진 전송</p>
                            </div>
                        </div>
                        <div class="steps">
                            <div class="step4 step">
                                <img src="../../html/assets/img/request/confirm.svg" alt="확인 및 수정">
                                <p>확인 및 수정</p>
                            </div>
                            <div class="step5 step">
                                <img src="../../html/assets/img/request/present.svg" alt="웹 앨범 완성">
                                <p>웹 앨범 완성</p>
                            </div>
                        </div>
                        <a href="request.php" class="process__go">의뢰하러 가기</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>