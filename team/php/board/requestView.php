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
    <title>문의사항 보기</title>
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

<main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
        <div class="container">
            <h3 class="section__title">의뢰하기</h3>
            <p class="section__desc">의뢰한 사항은 수정 가능합니다.</p>
            <div class="board__inner">     
                <div class="board__table">
                    <table class="view">
                        <colgroup>
                        <col style="width: 30%;">
                        <col style="width: 70%;">
                        </colgroup>
                        <tbody>
                        <?php
    $requestID = $_GET['requestID'];

    $sql = "SELECT r.requestID, r.selectLayout, r.requestTitle, r.requestContents, r.requestPhotoName, r.regTime, m.youName FROM myRequest r JOIN myMember m ON(m.memberID = r.memberID) WHERE r.requestID = {$requestID}";
    $result = $connect -> query($sql);

    if($result){
        $request = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<tr><th>제목</th><td class='left'>".$request['requestTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$request['youName']."</td></tr>";
        echo "<tr><th>레이아웃</th><td class='left'>".$request['selectLayout']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $request['regTime'])."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$request['requestContents']."</td></tr>";
        echo "<tr><th>업로드 파일</th><td class='left'>".$request['requestPhotoName']."</td></tr>";
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__btn">
                <a href="requestList.php">목록보기</a>
                <a href="requestModify.php?requestID=<?=$requestID?>">수정하기</a>
            </div>
            </div>
        </div>
        </section>
        </main>
        <!-- //main -->
        <script>
        function noticeRemove (){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }
    </script>
    
</body>
</html>