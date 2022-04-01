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
    <title>문의사항 검색</title>
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
                <h3 class="section__title">문의사항 검색 게시판</h3>
                <p class="section__desc">문의사항 검색 결과 입니다.</p>
                <div class="board__inner">
                    <div class="board__search">
                        <?php
                            function msg($alert){
                                echo "<p class='result'>총".$alert." 건이 검색되었습니다.</p>";
                            }

                            $searchKeyword = $_GET['searchKeyword'];
                            $searchOption = $_GET['searchOption'];

                            $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
                            $searchOption = $connect -> real_escape_string(trim($searchOption));


                            $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID)";

                            switch($searchOption){
                                case 'title':
                                $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;

                                case 'content':
                                $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;

                                case 'name':
                                $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;
                            }
                            $result = $connect -> query($sql);

                            // if($result == true) {
                            //     echo "쿼리 완료";
                            // } else {
                            //     echo "쿼리 실패";
                            // }

                            if($result){
                                $count = $result -> num_rows;
                                msg($count);
                            }
                            ?>
                            </div>
                    <div class="board__table">
                        <table class="hover">
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
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        if(isset($_GET['page'])){
                            $currentPage = (int)$_GET['page'];
                        } else {
                            $currentPage = 1;
                        }

                          $PageView = 10;
                          $PageLimit = ($PageView * $currentPage) - $PageView;
                      
                          $sql .= " LIMIT {$PageLimit}, {$PageView}";
                          $sqlLimitResult = $connect -> query($sql);

                            if($sqlLimitResult){
                                $count = $sqlLimitResult -> num_rows;

                                if($count > 0){
                                    for($i=1; $i<=$count; $i++){
                                    $boardInfo = $sqlLimitResult -> fetch_array(MYSQLI_ASSOC);
                                    echo "<tr>";
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
                            </tbody>
                        </table>
                    </div>
                    <div class="board__pages">
                        <ul>
                        <?php
                        $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(b.memberID = m.memberID)";

                        switch($searchOption) {
                            case 'title':
                                $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;
                    
                            case 'content':
                                $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;
                    
                            case 'name':
                                $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
                                break;
                        }

                        $sqlResult = $connect -> query($sql);

                        $pagingCount = $sqlResult -> num_rows;

                        $totalPagingCount = ceil($pagingCount / $PageView);

                        $currentInquiryCount = 5;
                        $startPage = $currentPage - $currentInquiryCount;
                        $endPage = $currentPage + $currentInquiryCount;

                        if($startPage < 0) {
                            $startPage = 1;
                        }

                        if($endPage >= $totalPagingCount) {
                            $endPage = $totalPagingCount;
                        }

                        if($currentPage != 1) {
                            echo "<li><a href='inquirySearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page=1'>처음으로</a></li>";
                        }

                        if($currentPage > 1) {
                            $prevPage = $currentPage - 1;
                            echo "<li><a href='inquirySearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$prevPage}'>이전</a></li>";
                        }

                        for($i = $startPage; $i <= $endPage; $i++) {
                            $active ="";
                            if($i == $currentPage) {
                                $active = "active";
                            }
                            echo "<li class='{$active}'><a href='inquirySearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$i}'>{$i}</a></li>";
                        }

                        if($currentPage != $endPage) {
                            $nextPage = $currentPage + 1;
                            echo "<li><a href='inquirySearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$nextPage}'>다음</a></li>";
                        }

                        if($currentPage != $totalPagingCount) {
                           echo "<li><a href='inquirySearch.php?searchKeyword={$searchKeyword}&searchOption={$searchOption}&page={$totalPagingCount}'>마지막</a></li>";
                        }

                        ?>
                        </ul>
                    </div>
                </div>
        </section>
    </main>

</body>

</html>