<?php
 include "../connect/connect.php";
 include "../connect/session.php";
 include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
    $memberID = $_SESSION['memberID'];
    $youPhoto = $_FILES['youPhoto'];
// echo $youPhoto;

echo "<pre>";
var_dump($youPhoto);
echo "</pre>";

    $youPhotoName = $_FILES['youPhoto']['name'];
    $youPhotoType = $_FILES['youPhoto']['type'];
    $youPhotoTmp = $_FILES['youPhoto']['tmp_name'];
    $youPhotoSize = $_FILES['youPhoto']['size'];

    // echo $youPhotoName;
    // echo $youPhotoType;
    // echo $youPhotoTmp;
    // echo $youPhotoSize;

    $fileTypeExtension = explode("/", $youPhotoType);
    $fileType = $fileTypeExtension[0]; //img
    $fileExtension = $fileTypeExtension[1]; //jpeg

    // echo $fileType; echo"<br>";
    // echo $fileExtension;

    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $fileImgDir = "../../html/assets/img/mypage/"; //경로설정
            $youPhotoName = "Img_".time().rand(1,99999)."."."{$fileExtension}"; //이미지 충돌방지를 위해 이미지명 랜덤설정
            echo $youPhotoName;
            $sql = "UPDATE myMember SET youPhoto = '{$youPhotoName}' WHERE memberID = '{$memberID}'";
            $connect -> query($sql);
            } else {
                echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1);</script>";
            }
        } 
        $result = $connect -> query($sql);
        $result = move_uploaded_file($youPhotoTmp, $fileImgDir.$youPhotoName);

        
    ?>

    <script>
        location.href = "myPage.php";
    </script>


</body>
</html>