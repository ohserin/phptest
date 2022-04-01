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
        <section id="loginBox">
            <div class="loginBox_img"></div>
                <div class="loginBox_text">
                    <h4 class="forgetID">ID 찾기</h4>
                    <form action="forgetID.php" name="forget" method="POST">
                        <fieldset>
                            <legend class="ir_so">회원 정보 찾기 입력폼</legend>
                            <div class="forget-box">
                                <div>
                                    <label for="youPhone">휴대폰 번호 입력</label>
                                    <input type="text" id="youPhone" class="forgetInput" name="youPhone" maxlength="20" placeholder="OOO-OOOO-OOOO" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="login-submit" type="submit">Find ID</button>
                        </fieldset>
                    </form>
                    <h4 class="forgetID mt40">PW 찾기</h4>
                    <form action="forgetPW.php" name="forget" method="POST">
                        <fieldset>
                            <legend class="ir_so">회원 정보 찾기 입력폼</legend>
                            <div class="forget-box">
                                <div>
                                    <label for="youEmail">이메일 입력</label>
                                    <input type="text" id="youEmail" class="forgetInput" name="youEmail" maxlength="20" placeholder="pics@naver.com" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPhone">휴대폰 번호 입력</label>
                                    <input type="text" id="youPhone" class="forgetInput" name="youPhone" maxlength="20" placeholder="OOO-OOOO-OOOO" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="login-submit" type="submit">Find PW</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

    </main>
</body>
</html>