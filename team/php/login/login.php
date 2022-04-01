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
<style>
</style>

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
                    <h3>Sign in</h3>
                    <p class="desc">Sign in and start making your web album!</p>
                    <form action="loginSave.php" name="join" method="POST">
                        <fieldset>
                            <legend class="ir_so">로그인 입력폼</legend>
                            <div class="join-box">
                                <div>
                                    <label for="youEmail"></label>
                                    <input type="email" id="youEmail" name="youEmail" maxlength="20" placeholder="Login ID" autocomplete="off" autofocus required>
                                </div>
                                <div>
                                    <label for="youPass"></label> 
                                    <input type="password" id="youPass" name="youPass" placeholder="Password" autocomplete="off"  required>
                                </div>
                                <div class="check">
                                <form action="#">
                                    <label for="chk">
                                        <input type="checkbox" id="chk">
                                        <i class="circle"></i>
                                    </label>
                                </form>
                                <span class="text">아이디저장</span>
                                <p class="remember" href="forget.php">Forget <a href="forgetID.php">ID</a>/<a href="forgetPW.php">Password</a>?</p>
                            </div>
                            </div>
                            <button id="joinBtn" class="login-submit" type="submit">Login</button>
                        </fieldset>
                    </form>
            </section>
        </div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

        //저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
        var key = getCookie("key");
        $("#youEmail").val(key);


        if($("#youEmail").val() !=""){               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
            $("#chk").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
        }

        $("#chk").change(function(){ // 체크박스에 변화가 있다면,
                if($("#chk").is(":checked")){ // ID 저장하기 체크했을 때,
                    setCookie("key", $("#youEmail").val(), 2); // 하루 동안 쿠키 보관
                }else{ // ID 저장하기 체크 해제 시,
                    deleteCookie("key");
                }
        });

            // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
            $("#youEmail").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
                if($("#chk").is(":checked")){ // ID 저장하기를 체크한 상태라면,
                    setCookie("key", $("#youEmail").val(), 2); // 7일 동안 쿠키 보관
                }
            });
        });

        //쿠키 함수 
        function setCookie(cookieName, value, exdays){
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
            document.cookie = cookieName + "=" + cookieValue;
        }

        function deleteCookie(cookieName){
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() - 1);
            document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
        }

        function getCookie(cookieName) {
            cookieName = cookieName + '=';
            var cookieData = document.cookie;
            var start = cookieData.indexOf(cookieName);
            var cookieValue = '';
            if(start != -1){
                start += cookieName.length;
                var end = cookieData.indexOf(';', start);
                if(end == -1)end = cookieData.length;
                cookieValue = cookieData.substring(start, end);
            }
            return unescape(cookieValue);
        }
    </script>
</body>
</html>