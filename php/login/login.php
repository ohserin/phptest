<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
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
                <h3>로그인</h3>

            <form action="loginSave.php" name="login" method="post">
                <fieldset>
                    <legend class="ir_so">로그인 입력폼</legend>
                    <div class="join-box">
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off" required>
                        </div>
                    </div>
                </fieldset>
                <button id="joinBtn" class="join-submit" type="submit">로그인</button>
            </form>
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