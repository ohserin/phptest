<?php
include "../connect/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php
    include '../include/style.php';
?>
</head>

<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->

<?php
    include "../connect/connect.php";
    $youName = $_POST['youName'];
    $youNickName = $_POST['youNickName'];
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $youGender = $_POST['youGender'];
    $youIntro = $_POST['youIntro'];
    $regTime = time();

    
    $searchString = "-";
    $replaceString = "";
    $originalString = $youPhone;
    
    $youPhone = str_replace($searchString, $replaceString, $originalString);

    $originalString = $youBirth;
    
    $youBirth = str_replace($searchString, $replaceString, $originalString);

    // echo $youName, $youNickName, $youEmail, $youPass, $youPassC, $youBirth, $youPhone, $youGender, $youIntro, $regTime; 
    //-> 성공
    
    // 유효성 검사 시작
    // NickName 유효성 검사
    // $check_nickName = preg_match("/^[가-힣a-zA-Z]+$/", $youNickName);

    // if($check_nickName == false){
    //     echo "<script>alert('닉네임에는 한글 또는 영어만 사용할 수 있습니다.'); history.back(1)</script>";
    //     exit;
    // }

    //youEmail 중복 검사 -> 중복된 이메일이 있으면 로그인 유도 or 다시 확인 부탁 || 중복된 이메일이 없으면 로그인 진행
    //우선 false라고 가정하고 시작\
    // $isEmailCheck = false;
    //이메일 목록 가져오기
    // $sql = "SELECT youNickName FROM myMember WHERE youNickName = '$youNickName'";
    // $result = $connect -> query($sql);

    // if($result){
    //     $count = $result -> num_rows;
    //     if($count == 0){
    //         //회원가입 가능
    //         $isEmailCheck = true;
    //     } else {
    //         echo "<script>if(!confirm('사용되고 있는 닉네임입니다. 로그인하시겠습니까?')){";
    //         echo " history.back(1);} else {window.location.replace('login.php');}</script>";
    //         exit;
    //     }
    // } else {
    //     msg("에러발생01 -- 관리자에게 문의하세요!");
    //     exit;
    // }

    // Name 유효성 검사
    // $check_name = preg_match("/^[가-힣a-zA-Z]+$/", $youName);

    // if($check_name == false){
    //     echo "<script>alert('이름이 정확하지 않습니다. 다시 확인해주세요.'); history.back(1)</script>";
    //     exit;
    // }

    //youEmail 중복 검사 -> 중복된 이메일이 있으면 로그인 유도 or 다시 확인 부탁 || 중복된 이메일이 없으면 로그인 진행
    //우선 false라고 가정하고 시작\
    $isEmailCheck = false;
    //이메일 목록 가져오기
    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            //회원가입 가능
            $isEmailCheck = true;
        } else {
            echo "<script>if(!confirm('가입되어 있는 이메일입니다. 로그인하시겠습니까?')){";
            echo " history.back(1);} else {window.location.replace('login.php');}</script>";
            exit;
        }
    } else {
        msg("에러발생01 -- 관리자에게 문의하세요!");
        exit;
    }

    // 비밀번호 검사
    if($youPass !== $youPassC){
        echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요.'); history.back(1);</script>";
        exit;
    }

    // 최종 회원가입
    if($youPass == $youPassC){
        $sql = "INSERT INTO myMember(youName, youNickName, youEmail, youPass, youBirth, youPhone, youGender, youIntro, regTime) 
        VALUES('$youName','$youNickName', '$youEmail', '$youPass','$youBirth', '$youPhone', '$youGender', '$youIntro', '$regTime')";

        $result = $connect -> query($sql);

        var_dump($result);
        if($result){
            echo "<script>alert('회원가입을 축하합니다. 로그인을 해주세요.'); window.location.replace('login.php');</script>";
        } else {
            echo "<script>alert('에러발생3, 관리자에게 문의하세요.'); history.back(1);</script>";
        }
    } else {
        echo "<script>alert('다시 한 번 확인하세요.');</script>";
    }

    
?>

</body>
</html>

