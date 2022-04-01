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

    <main id="main">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">의뢰 수정하기</h3>
                <p class="section__desc mt30">작성하신 의뢰에 대한 글을 수정하는 게시판입니다</p>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="requestModifySave.php" name="request" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">의뢰하기 영역</legend>

                                <?php
                                $requestID = $_GET['requestID'];

                                $sql = "SELECT selectLayout, requestTitle, requestContents, requestPhotoName, regTime, requestID, requestPhoto FROM myRequest WHERE requestID = {$requestID}";
                                $sqlResult = $connect -> query($sql);
                                
                                $requestData = $sqlResult -> fetch_array(MYSQLI_ASSOC);
                                ?>

                                <div class="mb30" style="display:none;">
                                    <label for="requestID" class="mb20">번호</label>
                                    <input type="text" name="requestID" id="requestID" value="<?=$requestData['requestID']?>" required>
                                </div>

                                <div class="mb30">
                                    <label for="requestTitle" class="mb20">제목</label>
                                    <input type="text" name="requestTitle" id="requestTitle" value="<?=$requestData['requestTitle']?>" required>
                                </div>

                                <div class="mb30">
                                    <label for="requestContents" class="mb20">내용</label>
                                    <textarea name="requestContents" id="requestContents" required><?=$requestData['requestContents']?></textarea>
                                </div>

                                <div class="mb30">
                                    <label for="photoUpload" class="mb20">업로드한 파일 : <?=$requestData['requestPhotoName']?></label>
                                    <input type="file" name="photoUpload" id="photoUpload" multiple value="<?=$requestData['requestPhotoName']?>">
                                </div>

                                <div class="mb30">
                                    <label for="passwordCheck" class="mb20">비밀번호 확인</label>
                                    <input type="password" name="passwordCheck" id="passwordCheck">
                                </div>

                                <div class="mb50">
                                    <a href="#" class="request-btn mb50">의뢰하기<a>
                                    <a href="requestList.php" class="request-btn mb50">목록보기</a>
                                    <button location.href="requestModifySave.php" class="request-btn mb50" type="submit" value="수정하기">수정하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <script>
        function noticeRemove() {
            let notice = confirm("정말 삭제하시겠습니까?", "");
            return notice;
        }
    </script>
</body>

</html>