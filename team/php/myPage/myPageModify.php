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
    <title>나의 정보 수정</title>
    <?php
    include '../include/headerpurple.php';
?>
<style>
    body {
        background: #C5CAE9;
    }
    .modify .test {
        color: rgb(77, 89, 89);
        border: 0.5px solid rgb(77, 89, 89);
        padding: 0.5px 10px;
        font-size: 12px;
        float: right;
    } 
    .modify .comment {
        color: red;
        font-size: 13px;
        padding-left: 15px;
    }
</style>
</head>
<body>

<main id="main">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>

                <form action="myPageModifySave.php" name="join" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="ir_so">회원정보 입력폼</legend>
                        <div class="join-intro">
                            <div class="face">
                            <?php
    
    $memberID = $_SESSION['memberID'];
    $youPhoto = $_POST['youPhoto'];

    $sql = "SELECT youPhoto FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);

    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<div class='face'><img src='../../html/assets/img/mypage/".$memberInfo['youPhoto']."' alt='프로필이미지'></div>";
    }
?>
                            </div>
<div>
                          
                        </div>
                        <div class="join-box">
                            <ul>
<?php
 $memberID = $_SESSION['memberID'];
 $youEmail = $_POST['youEmail'];
 $youNickName = $_POST['youNickName'];
 $youName = $_POST['youName'];
 $youBirth = $_POST['youBirth'];
 $youPhone = $_POST['youPhone'];
 $youGender = $_POST['youIntro'];

 $sql = "SELECT memberID, youEmail, youNickName, youName, youBirth, youPhone, youIntro, youSite FROM myMember WHERE memberID = {$memberID}";
 $result = $connect -> query($sql);

 if($result){
     $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

     echo "<div class='modify'><label for='youEmail'>이메일
     <a href='#c' class='test' onclick='emailChecking()'>중복검사</a>
     <p class='comment' id='youEmailComment'></p>
     </label><input type='email' id='youEmail' value='".$memberInfo['youEmail']."' name='youEmail' autocomplete='off'></div>";

     echo "<div class='modify'><label for='youNickName'>닉네임
     <a href='#c' class='test' onclick='nickNameChecking()'>중복검사</a>
     <p class='comment' id='youNickNameComment'></p>
     </label> <input type='text' id='youNickName' value='".$memberInfo['youNickName']."' name='youNickName' autocomplete='off'></div>";

     echo "<div class='modify'><label for='youName'>이름</label> <input type='text' id='youName' value='".$memberInfo['youName']."' name='youName' autocomplete='off'></div>";
     echo "<div class='modify'><label for='youBirth'>생년월일</label><input type='text' id='youBirth' value='".$memberInfo['youBirth']."' name='youBirth' autocomplete='off'></div>";
     echo "<div class='modify'><label for='youPhone'>휴대폰 번호
     <a href='#c' class='test' onclick='phoneChecking()'>중복검사</a>
     <p class='comment' id='youPhoneComment'></p>
     </label><input type='text' id='youPhone' value='".$memberInfo['youPhone']."' name='youPhone' autocomplete='off'></div>";

 }
?>
</ul>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원정보 수정</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <!-- //main -->
</main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        let emailCheck = false;
        let nickCheck = false;
        let phoneCheck = false;

        //emailChecking
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

                        let getPhone = RegExp(/^01([0|1|6|7|8|9])-?([0-9]{3,4})?([0-9]{4})$/);

                        if(!getPhone.test($("#youPhone").val())){
                            $("#youPhoneComment").text("숫자만 입력해주세요.");
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


    </script>
</body>
</html>