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
    <title>나의 정보</title>
    <?php
    include '../include/headerpurple.php';
?>
<style>
    body {
        background: #C5CAE9;
    }
</style>
</head>
<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->

<main id="main">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3>회원 정보</h3>
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
<form action="myPageSave.php" name="youPhoto" method="post" enctype="multipart/form-data">
                <fieldset>

                            <label for="youPhoto" class="profile">프로필 업로드</label>
                            <input type="file" name="youPhoto" id="youPhoto" placeholder="사진을 넣어주세요! 사진은 JPG, PNG 타입만 넣을 수 있습니다.">
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">완료</button>
                        </fieldset>
                </form>
                          
                        </div>
                        <div class="join-info">
                            <ul>
<?php
 $memberID = $_SESSION['memberID'];
 $youEmail = $_POST['youEmail'];
 $youNickname = $_POST['youNickName'];
 $youName = $_POST['youName'];
 $youBirth = $_POST['youBirth'];
 $youPhone = $_POST['youPhone'];
 $youGender = $_POST['youGender'];

 $sql = "SELECT memberID, youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite FROM myMember WHERE memberID = {$memberID}";
 $result = $connect -> query($sql);

 if($result){
     $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
     echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span></li>";
     echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickName']."</span></li>";
     echo "<li><strong>이름</strong><span>".$memberInfo['youName']."</span></li>";
     echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span></li>";
     echo "<li><strong>전화번호</strong><span>".$memberInfo['youPhone']."</span></li>";
     echo "<li><strong>성별</strong><span>".$memberInfo['youGender']."</span></li>";
 }
?>
</ul>
                        </div>
                        <div class="join-btn">
                            <a href="../myPage/myPageModify.php">수정하기</a>
                            <a href="../pages/main.php">저장하기</a>
                        </div>
            </div>
        </section>
    </main>
    <!-- //main -->
</main>
    
</body>
</html>