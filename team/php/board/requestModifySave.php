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
    <title>문의하기</title>
    <?php
    include '../include/headerblue.php';
?>
    <style>
    body {
        background: #fff;
    }
    </style>
</head>

<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->
    <?php
    $memberID = $_SESSION['memberID'];
    $requestID = $_POST['requestID'];
    $requestTitle = $_POST['requestTitle'];
    $requestPhoto = $_POST['requestPhoto'];
    $passwordCheck = $_POST['passwordCheck'];
    $regTime = time();
    
    $requestContents = $_POST['requestContents'];
    $photoUpload = $_FILES['photoUpload'];
    $photoSize = $_FILES['photoUpload']['size'];
    $tempPhoto = $_FILES['photoUpload']['tmp_name'];
    $photoName = $_FILES['photoUpload']['name'];
    $requestPhotoType = $_FILES['photoUpload']['type'];

    $requestPhotoTypeExtension = explode("/", $requestPhotoType);

    $fileType = $requestPhotoTypeExtension[0];
    $fileExtension = $requestPhotoTypeExtension[1];

    $memberSql = "SELECT m.memberID, m.youPass, r.memberID FROM myMember m JOIN myRequest r ON(r.memberID = m.memberID) WHERE r.memberID = '$memberID'";

    $memberResult = $connect -> query($memberSql);
    $memberData = $memberResult -> fetch_array(MYSQLI_ASSOC);

    if($memberData['youPass'] == $passwordCheck) {
        if($photoSize <= 1048576) {
            $photoDirection = "../../html/assets/img/request/";
            $photoTempName = "{$memberID}"."memberID".time()."."."{$fileExtension}";
    
            $sqlUpdate = "UPDATE myRequest SET requestTitle = '{$requestTitle}', requestContents = '{$requestContents}', requestPhotoName= '{$photoName}', regTime = '{$regTime}', requestPhoto = '{$photoTempName}' WHERE requestID = '{$requestID}'";
            $result = $connect -> query($sqlUpdate);
    
            $result = move_uploaded_file($tempPhoto, $photoDirection.$photoTempName);

            //Header("Location: requestList.php");
        } else {
            echo "<script>alert('파일 크기가 1MB를 넘어 업로드 할 수 없습니다'); history.back(1);</script>";
        }

    } else {
        echo "<script>alert('비밀번호가 다릅니다'); </script>";
    }
    ?>
</body>
</html>

      
 