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
        <section id="loginBox" class="forgetPWBox">
            <div class="loginBox_img"></div>
                <div class="loginBox_text">
                    <h4 class="forgetPW">PW 찾기</h4>
                    <form action="forgetPWSave.php" name="forget" method="POST">
                        <fieldset>
                            <legend class="ir_so">회원 정보 찾기 입력폼</legend>
                            <div class="forget-box">
                                <div>
                                    <label for="youEmail" class="mt20">이메일</label>
                                    <input type="text" id="youEmail" class="forgetInput" name="youEmail" maxlength="20" placeholder="pics@naver.com" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPhone" class="mt10">휴대폰 번호</label>
                                    <input type="text" id="youPhone" class="forgetInput" name="youPhone" maxlength="20" placeholder="OOO-OOOO-OOOO" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youBirth" class="mt10">생년월일</label>
                                    <input type="text" id="youBirth" class="forgetInput" name="youBirth" maxlength="20" placeholder="YYYY-MM-DD" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="login-submit mt50" type="submit">Find PW</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

    </main>
</body>
</html>