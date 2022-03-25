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
<?php
////youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro
$memberID = $_SESSION['memberID'];
$youEmail = $_POST['youEmail'];
$youNickName = $_POST['youNickName'];
$youName = $_POST['youName'];
$youBirth = $_POST['youBirth'];
$youPhone = $_POST['youPhone'];
$youGender = $_POST['youGender'];
$youSite = $_POST['youSite'];
$youIntro = $_POST['youIntro'];
$sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro FROM myMember WHERE memberID = {$memberID}";
$result = $connect -> query($sql);
if($result){
    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    echo "<div class='intro'>현재상태를 적어주세요!".$memberInfo['youIntro']."</div>";
}
?>
                            <!-- <div class="intro">나무에 관심이 적은 오세린 입니다.</div> -->
                        </div>
                        <div class="join-info">
                            <ul>
<?php
 $memberID = $_SESSION['memberID'];
 $youEmail = $_POST['youEmail'];
 $youNickName = $_POST['youNickName'];
 $youName = $_POST['youName'];
 $youBirth = $_POST['youBirth'];
 $youPhone = $_POST['youPhone'];
 $youGender = $_POST['youGender'];
 $youSite = $_POST['youSite'];
 $youIntro = $_POST['youIntro'];
 $sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro FROM myMember WHERE memberID = {$memberID}";
 $result = $connect -> query($sql);
 if($result){
     $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
     echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
     echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickName']."</span></li>";
     echo "<li><strong>이름</strong><span>".$memberInfo['youName']."</span></li>";
     echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span></li>";
     echo "<li><strong>번호</strong><span>".$memberInfo['youPhone']."</span></li>";
     echo "<li><strong>성별</strong><span>".$memberInfo['youGender']."</span></li>";
     echo "<li><strong>사이트</strong><span>".$memberInfo['youSite']."</span></li>";
 }

//이메일
//닉네임
//이름
//생일
//번호
//성별
//사이트
?>
                                <!-- <li>
                                    <strong>이메일</strong>
                                    <span>a@naver.com</span>
                                </li> -->
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