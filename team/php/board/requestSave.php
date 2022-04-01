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
    <title>Document</title>
</head>
<body>
    
<?php
    $memberID = $_SESSION['memberID'];
    $selectLayout = $_POST['selectLayout'];
    $requestTitle = $_POST['requestTitle'];
    $requestContents = $_POST['requestContents'];
    $requestPhoto = $_FILES['photoUpload'];
    $regTime = time();
    
    $requestTitle = $connect -> real_escape_string($requestTitle);
    $requestContents = $connect -> real_escape_string($requestContents);

    //빈 값
    if($selectLayout == NULL){
        echo "<script>alert('레이아웃을 선택해주세요.');history.back(1);</script>";
        exit;
    }

    // 이미지 파일, 크기, 이름, 형태 저장할 공간 임시파일 불러오기
    $requestPhotoSize = $_FILES['photoUpload']['size']; //크기
    $requestPhotoType = $_FILES['photoUpload']['type']; //타입
    $requestPhotoName = $_FILES['photoUpload']['name']; //이름
    $requestPhotoTemp = $_FILES['photoUpload']['tmp_name']; //임시 이름

    $requestPhotoTypeExtension = explode("/", $requestPhotoType);

    $fileType = $requestPhotoTypeExtension[0];
    $fileExtension = $requestPhotoTypeExtension[1];

    //최종
    if($fileType == "" || $fileType == NULL){
        echo "<script>if (!confirm('파일을 업로드하지 않은 것이 맞습니까?')) 
        {history.back(1);} else {";
            $sql = "INSERT INTO myRequest(memberID, selectLayout, requestTitle, requestContents, regTime) 
            VALUES('$memberID','$selectLayout','$requestTitle','$requestContents', '$regTime')";

            $connect -> query($sql);

        echo "location.href='requestList.php'";
            // Header("Location: requestList.php");

        echo  "}</script>";
        
    } else {
        if((int)$requestPhotoSize < 1048576){
            $requestDirection = "../../html/assets/img/request/";
            $requestNewName = "{$memberID}"."memberID".time()."."."{$fileExtension}";
    
            $sql = "INSERT INTO myRequest(memberID, selectLayout, requestTitle, requestContents, requestPhoto, requestPhotoName, regTime) 
            VALUES('$memberID','$selectLayout','$requestTitle','$requestContents','$requestNewName','$requestPhotoName','$regTime')";
    
            $result = $connect -> query($sql);
    
            $result = move_uploaded_file($requestPhotoTemp, $requestDirection.$requestNewName);

            Header("Location: requestList.php");
        } else {
            echo "<script>alert('이미지 용량이 1MB가 넘습니다. 다른 사진을 선택해주세요.'); history.back(1);</script>";
        }
        
    }


    // if($fileType == "image") {
    //     if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif") {
    //         $imgDirection = "../../html/assets/img/request/";
    //         //$imgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";

    //         $sql = "SELECT memberID, requestTitle, requestContents, requestPhoto, regTime FROM myRequest WHERE memberID = $memberID";
    //         $queryResult = $connect -> query($sql);

    //         if($queryResult == true) {
    //             echo "resultQuery 쿼리 성공";
    //         } else {
    //             echo "resultQuery 쿼리 실패";
    //         }

    //         if(isset($imgFileName)) {
    //             $fileCount = count($imgFileName);
    //             var_dump($fileCount);

    //             $sql = "INSERT INTO myRequest(memberID, requestTitle, requestContents, requestPhoto, regTime) VALUES('$memberID' ,'$requestTitle', '$requestContents', '$imgFileName', '$regTime')";
    //             $sqlResult = $connect -> query($sql);

    //             for($count = 0; $count < $fileCount; $count++) {
    //                 $name = $_FILES['photoUpload[]']['name']['$count'];

    //                 $tempImgFile = $_FILES['photoUpload[]']['tmp_name'][$count];
    //                 $imgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";

    //                 $sqlResult = move_uploaded_file($tempImgFile, $imgDirection.$name);
    //                 $sqlResult = $connect -> query($sql);     
    //             }
    //         } else {
    //             echo "파일 이름이 설정되어 있지 않음";
    //         }

    //     } else {
    //         echo "<script>alert('이미지 파일 확장자는 jpg / jpeg / png / gif 파일을 지원합니다'); history.back(1);</script>";
    //     }

    // } else {
    //     echo "<script>alert('이미지 파일을 업로드하세요');</script>";
    // }

    // if($sqlResult == true) {
    //     echo "쿼리 성공";
    // } else {
    //     echo "쿼리 실패";
    // }

    // $sqlResult = move_uploaded_file($imgTempFile, $imgDirection.$imgName);


?>

</body>
</html>