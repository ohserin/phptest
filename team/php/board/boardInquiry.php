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

    <main id="main">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">문의사항</h3>
                <p class="section__desc">PICS의 궁금한점과 불편한점을 자유롭게 작성해주세요!</p>
                <div class="board__inner">
                    <div class="board__search">
                        <form action="inquirySearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div>
                                    <input type="search" name="searchKeyword" class="search-form"
                                        placeholder="검색어를 입력하세요!" aria-label="search" required>
                                </div>
                                <div>
                                    <select name="searchOption" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">글쓴이</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="inquirySearch.php" class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="inquiryWrite.php" class="search-btn black">글쓰기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="inquiry">
                            <colgroup>
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>글쓴이</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    //게시판 불러올 갯수
    $PageView = 10;
    $PageLimit = ($PageView * $page) - $PageView;

 
    
  $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$PageLimit}, {$PageView}";
  $result = $connect -> query($sql);

  if($result){
      $count = $result -> num_rows;
      
      if($count > 0){
          for($i=1; $i<=$count; $i++){
            $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<tr onClick=\"location.href='boardView.php?boardID={$boardInfo['boardID']}'\">";
            echo "<td>".$boardInfo['boardID']."</td>";
            echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
            echo "<td>".$boardInfo['youName']."</td>";
            echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
            echo "<td>".$boardInfo['boardView']."</td>";
            echo "</tr>";
          }
      }
  }
?>
                        </table>
                    </div>
                    <div class="board__pages">
                        <ul>
                            <?php
                       include "inquiryPage.php";
                    ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

</body>

</html>