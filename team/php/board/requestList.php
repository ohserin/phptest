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
            <h3 class="section__title">나의 의뢰</h3>
            <p class="section__desc"></p>
            <div class="board__inner">
                <div class="board__table">
                    <table class="inquiry">
                        <colgroup>
                        <col style="width: 5%;">
                        <col>
                        <col style="width: 10%;">
                        <col style="width: 12%;">
                    </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody>
<?php    

    $memberID = $_SESSION['memberID'];

    $sql = "SELECT r.requestID, r.requestTitle, r.regTime, m.youName FROM myRequest r JOIN myMember m ON(m.memberID = r.memberID) WHERE r.memberID = {$memberID} ORDER BY requestID DESC";
    $result = $connect -> query($sql);
    
    if($result){
        $count = $result -> num_rows;
        
        if($count > 0){
            for($i=1; $i<=$count; $i++){
                $requestInfo = $result -> fetch_array(MYSQLI_ASSOC);
              echo "<tr onClick=\"location.href='requestView.php?requestID={$requestInfo['requestID']}'\">";
              echo "<td>".$requestInfo['requestID']."</td>";
              echo "<td class='left'><a href='requestView.php?requestID={$requestInfo['requestID']}'>".$requestInfo['requestTitle']."</a></td>";
              echo "<td>".$requestInfo['youName']."</td>";
              echo "<td>".date('Y-m-d', $requestInfo['regTime'])."</td>";
              echo "</tr>";
            }
        }
    }
?>
                    </table>
            <a href="request.php" class="request-btn mt30">의뢰하기</a>
                </div>
            </div>
        </div>
        </section>
        </main>
        <!-- //main -->
    
</body>
</html>