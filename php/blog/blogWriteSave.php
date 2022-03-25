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
        $blogAuthor = $_SESSION['youName'];
        $blogCate = $_POST['blogCate'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = $_POST['blogContents'];
        $blogView = 1;
        $blogLike = 0;
        $regTime = time();
        $blogImgFile = $_FILES['blogFile'];
        $blogImgSize = $_FILES['blogFile']['size'];
        $blogImgType = $_FILES['blogFile']['type'];
        $blogImgName = $_FILES['blogFile']['name'];
        $blogImgTmp = $_FILES['blogFile']['tmp_name'];

        // array(5) {
        //     ["name"]=>
        //     string(16) "wiss.tistory.jpg"
        //     ["type"]=>
        //     string(10) "image/jpeg"
        //     ["tmp_name"]=>
        //     string(14) "/tmp/phpmwRX6h"
        //     ["error"]=>
        //     int(0)
        //     ["size"]=>
        //     int(58509)
        // }

        // echo "<pre>";
        // var_dump($blogImgFile);
        // echo "</pre>";

        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg

        //이미지 확인 작업 / 이미지 확장자 확인 작업 / 용량 확인(숙제)
        if($fileType == "image"){
            //확장자 확인
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../assets/img/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$regTime')";
            } else {
                echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1);</script>";
            }
        } else {
            $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', 'default.svg', '1', '$regTime')";
        }
        $result = $connect -> query($sql);
        $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

        // if($_FILES['blogImgFile']['error']>0){

        // }
        
        Header("Location: blog.php");
    ?>
</body>
</html>