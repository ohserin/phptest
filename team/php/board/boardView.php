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
    include '../include/headerpurple.php';
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
            <h3 class="section__title">문의사항</h3>
            <p class="section__desc">불편했던점과 궁금했던점을 작성해주세요!</p>
            <div class="board__inner"> 

                    <button class="button mb20" type="submit" formmethod="get">
                        <div class="hand">
                            <div class="thumb"></div>
                        </div>
                        <span>Like<span>d</span></span>
                    </button>

                <div class="board__table">
                    <table class="view">
                        <colgroup>
                        <col style="width: 30%;">
                        <col style="width: 70%;">
                        </colgroup>
                        <tbody>
                        <?php
    $boardID = $_GET['boardID'];
    $memberID = $_SESSION['memberID'];

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql ="UPDATE myBoard SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<tr class='hover'><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr class='hover'><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr class='hover'><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr class='hover'><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr class='hover'><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__btn">
<?php
    $sql = "SELECT memberID FROM myBoard WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

    if($_SESSION['memberID'] == $boardInfo['memberID']){
        echo "<a href='inquiryRemove.php?boardID=<?=$boardID?>' onclick='return noticeRemove();'>삭제하기</a>
        <a href='inquiryModify.php?boardID=<?=$boardID?>'>수정하기</a>
        <a href='boardInquiry.php'>목록보기</a>";
    } else {
        echo "<a href='boardInquiry.php'>목록보기</a>";
    }
?>
                    <!-- <a href="boardInquiry.php">목록보기</a>
                    <a href="inquiryRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                    <a href="inquiryModify.php?boardID=<?=$boardID?>">수정하기</a> -->
                </div>
            </div>
        </div>
        </section>
        </main>
        <!-- //main -->

        <script src="../../html/assets/js/gsap.min.js"></script>
        <script>
        function noticeRemove (){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }

        document.querySelectorAll(".button").forEach((button) => {
            button.addEventListener("click", (e) => {
                button.classList.toggle("liked");
                if (button.classList.contains("liked")) {
                    gsap.fromTo(
                        button,
                        {
                            "--hand-rotate": 8
                        },
                        {
                            ease: "none",
                            keyframes: [
                                {
                                    "--hand-rotate": -45,
                                    duration: 0.16,
                                    ease: "none"
                                },
                                {
                                    "--hand-rotate": 15,
                                    duration: 0.12,
                                    ease: "none"
                                },
                                {
                                    "--hand-rotate": 0,
                                    duration: 0.2,
                                    ease: "none",
                                    clearProps: true
                                }
                            ]
                        }
                    );
                }
            });
        });


        // function clickLike(){
        //     
        //     $clickLike = $boardID = $_GET['boardID']; 
        //     $sql = "UPDATE myMember SET boardLike = boardLike + 1 WHERE boardID = {$boardID}";
        //     return $clickLike;
        //     ?>
        // }

    </script>
    
</body>
</html>