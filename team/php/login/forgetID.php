<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디찾기</title>
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
                    <h4 class="forgetID">ID 찾기</h4>
                    <form action="forgetIDSave.php" name="forget" method="POST">
                        <fieldset>
                            <legend class="ir_so">회원 정보 찾기 입력폼</legend>
                            <div class="forget-box">
                                <div>
                                    <label for="youPhone" class="mt20">휴대폰 번호</label>
                                    <input type="text" id="youPhone" class="forgetInput" name="youPhone" maxlength="20" placeholder="OOO-OOOO-OOOO" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youBirth" class="mt20">생년월일</label>
                                    <input type="text" id="youBirth" class="forgetInput" name="youBirth" maxlength="20" placeholder="YYYY-MM-DD" autocomplete="off" required>
                                </div>
                            </div>
                            <button id="joinBtn" class="login-submit mt50" type="submit">Find ID</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

    </main>
</body>
</html>