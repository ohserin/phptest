<?php
include "../connect/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
<?php
    include '../include/style.php';
?>
</head>
<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->

<main id="join">
            <section id="joinBox">
                <div class="joinBox_img"></div>
                <div class="joinBox_text">
                    <h3>Welcome to PICS</h3>
                    <form action="joinSave.php" name="join" method="POST" onsubmit="return joinChecks()">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
                            <div class="join-box">
                                <div>
                                    <label for="youName">Full Name</label> 
                                    <input type="text" id="youName" name="youName" maxlength="6" placeholder="John Doe" autocomplete="off" autofocus required>
                                </div>
                                <div class="mt10">
                                    <label for="youNickName">Nick Name<a href="#c" class="test" onclick="nickNameChecking()">중복검사</a></label> 
                                    <input type="text" id="youNickName" name="youNickName" maxlength="6" placeholder="Sweetie" autocomplete="off" required>
                                    <div class="joinCheck">
                                        <p class="comment" id="youNickNameComment"></p>
                                    </div>
                                </div>
                                <div>
                                    <label for="youEmail">Email<a href="#c" class="test" onclick="emailChecking()">중복검사</a></label> 
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Enter your Email here" autocomplete="off"  required>
                                        <p class="comment" id="youEmailComment"></p>
                                </div>
                                <div>
                                    <label for="youPass">Password</label> 
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="Enter your Password" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPassC">Password Check</label> 
                                    <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder="Enter your Password Check" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youBirth">Birth</label> 
                                    <input type="text" id="youBirth" name="youBirth" placeholder="YYYY-MM-DD" autocomplete="off">
                                </div>
                                <div>
                                    <label for="youPhone">Phone Number<a href="#c" class="test" onclick="phoneChecking()">중복검사</a></label> 
                                    <input type="text" id="youPhone" name="youPhone" placeholder="OOO-OOOO-OOOO" autocomplete="off" required>
                                        <p class="comment" id="youPhoneComment"></p>
                                </div>
                                <div>
                                    <label for="youGender">Gender</label> 
                                    <select name="youGender" id="youGender" class="youGender">
                                        <option value="">성별을 선택해 주세요.</option>
                                        <option value="남자">남자</option>
                                        <option value="여자">여자</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="youIntro">Intro</label> 
                                    <input type="text" id="youIntro" name="youIntro" placeholder="Introduce yourself." autocomplete="off">
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">Create Account</button>
                        </fieldset>
                    </form>
                    <p class="already">Already have an account? <a href="login.php">Log in</a></p>
                    <p class="or">OR</p>
                    <div class="connect_signUp">
                        <div class="google">
                            <a href="#1" onclick="needTime()">Sign up with Google</a>
                        </div>
                        <div class="git">
                            <a href="#c"  onclick="needTime()">Sign up with Github</a>
                        </div>
                    </div>
            </section>
        </div>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        let nickCheck = false;
        let emailCheck = false;
        let phoneCheck = false;

        // 구현 중
        function needTime(){
            alert("빠른 시일 내에 구현하겠습니다.");
        }

        // nickNameChecking #youNameComment
        function nickNameChecking(){
            let youNickName = $("#youNickName").val();

            if(youNickName == null || youNickName == ''){
                $("#youNickNameComment").text("닉네임을 입력해주세요!");
            } else {
                $.ajax({
                type: "POST",
                url: "joinCheck.php",
                data: {"youNickName": youNickName, "type": "nickCheck"},
                dataType: "json",

                success : function(data){
                    if(data.result == "good"){
                        $("#youNickNameComment").text("사용 가능한 닉네임입니다.");

                        let getNick = RegExp(/^[가-힣|0-9|a-z|A-Z]+$/);

                        if(!getNick.test($("#youNickName").val())){
                            $("#youNickNameComment").text("닉네임을 양식에 맞게 설정하세요.");
                        }

                        nickCheck = true;

                    } else {
                        $("#youNickNameComment").text("이미 사용 중입니다. 다른 닉네임을 사용해주세요.");
                        nickCheck = false;
                    }
                },

                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                    }
                });
            }
        }
        // emailChecking #youEmailComment
        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("이메일을 입력해주세요!");
            } else {
                $.ajax({
                type: "POST",
                url: "joinCheck.php",
                data: {"youEmail": youEmail, "type": "emailCheck"},
                dataType: "json",

                success : function(data){
                    if(data.result == "good"){
                        $("#youEmailComment").text("사용 가능한 이메일입니다.");

                        let getMail = RegExp(/^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+[A-Za-z0-9\-]+/);
                        if(!getMail.test($("#youEmail").val())){
                            $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요.");
                        }
                        emailCheck = true;
                    } else {
                        $("#youEmailComment").text("가입되어 있는 이메일입니다. 로그인을 해주세요.");
                        emailCheck = false;

                    }
                },
                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                    }
                });
            }
        }

        // phoneChecking #youPhoneComment
        function phoneChecking(){
            let youPhone = $("#youPhone").val();

            if(youPhone == null || youPhone == ''){
                $("#youPhoneComment").text("번호를 입력해주세요!");
            } else {
                $.ajax({
                type: "POST",
                url: "joinCheck.php",
                data: {"youPhone": youPhone, "type": "phoneCheck"},
                dataType: "json",

                success : function(data){
                    if(data.result == "good"){
                        $("#youPhoneComment").text("사용 가능한 휴대폰 번호입니다.");

                        let getPhone = RegExp(/^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/);

                        if(!getPhone.test($("#youPhone").val())){
                            $("#youPhoneComment").text("ex) OOO-OOOO-OOOO");
                            return false;
                        }
                        phoneCheck = true;
                    } else {
                        $("#youPhoneComment").text("가입되어 있는 휴대폰 번호입니다. 로그인을 해주세요.");
                        phoneCheck = false;

                    }
                },
                error : function(request, status, error){
                    console.log("request" + request);
                    console.log("status" + status);
                    console.log("error" + error);
                    }
                });
            }
        }

        // 제출 시 joinChecks
        function joinChecks(){
            if(nickCheck == false || emailCheck == false || phoneCheck == false){
                alert('중복검사를 완전하게 진행해주세요.');
                return false;
            }
        }

    </script>
</body>
</html>