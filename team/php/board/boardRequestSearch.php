<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>테스트용 게시판</title>

    <!-- style php-->
    <?php
    include "../include/style.php";
    ?>

<style>
        #board__wrap {
            margin: 0 auto;
            width: 1400px;
        }

        .board__container {
            margin-top: 100px;
        }

        .board__container h2 {
            font-size: 50px;
            text-align: center;
        }

        .board__container p {
            margin-top: 50px;
            margin-bottom: 50px;
            font-size: 20px;
            text-align: center;
        }

        .search {}

        .searchContainer {
            display: flex;
            flex-direction: row-reverse;
        }

        .searchContainer fieldset {
            border: 0px;
        }

        .searchContainer .searchBox {
            height: 30px;
        }

        .selectBox {
            height: 30px;
        }

        .searchBtn {
            height: 30px;
        }

        .writeBtn {
            height: 30px;
            text-decoration: none;
            color: black;
            border: 1px solid #111;
        }

        .board__contTable table {
            width: 100%;
        }

        .board__contTable table tr th {
            background-color: rgb(155, 144, 204);
        }

        .board__contTable td {
            background-color: rgb(191, 181, 238);
            text-align: center;
            line-height: 1.5;
        }

        .board__page {
            transform: translateX(-200px);
        }

        .board__page ul {
            list-style: none;
            display: flex;
        }

        .board__page li {
            text-decoration: none;
            margin: 0 5px 0 5px;
            border-radius: 1px solid;
        }

        .board__page li a {}

        .board__contTable {
            height: 300px;
        }
    </style>
</head>
<body>
    <!-- header php -->
    <?php
    include "../include/header.php";
    ?>

    <!-- contents -->
    <section id="board__wrap">
        <div class="board__container">
            <h2>테스트 게시판</h2>
            <p>테스트 내용</p>

            <div class="board__contTable">
                <table>
                    <colgroup>
                        <col style="width: 5%;">
                        <col style="width: 30%;">
                        <col style="width: 5%;">
                        <col style="width: 5%;">
                        <col style="width: 5%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>이름</th>
                            <th>등록 날짜</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $searchKeyword = $_GET['searchBox'];
                        $searchOptionData = $_GET['selectOption'];

                        $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
                        $searchOptionData = $connect -> real_escape_string(trim($searchOptionData));

                        $sqlData = "SELECT b.boardID, b.boardTitle, b.boardContents, b.regTime, m.youName FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID)";
                        $result = $sqlData -> query($sqlData);

                        $boardInfo = $sqlData -> fetch_array(MYSQLI_ASSOC);

                        if($searchOptionData == 'title') {
                            $sqlData .= "WHERE b.boardTitle LIKE '%{$searchOptionData}%' ORDER BY b.boardID DESC LIMIT 5";
                        } else if($searchOptionData == 'content') {
                            $sqlData .= "WHERE b.boardContents LIKE '%{$searchOptionData}%' ORDER BY b.boardID DESC LIMIT 5";
                        } else if($searchOptionData == 'name') {
                            $sqlData .= "WHERE m.youName LIKE '%{$searchOptionData}%' ORDER BY b.boardID DESC LIMIT 5";
                        }
                        ?>
                        
                        <!-- <tr>
                            <td>1</td>
                            <td class="title">테스트 제목</td>
                            <td>abc</td>
                            <td>2022-01-01</td>
                            <td>5</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="searchContainer">
            <h2>테스트 검색 게시판</h2>
            <p>테스트 내용</p>

            <div class="board__contTable">
                <table>
                    <colgroup>
                        <col style="width: 5%;">
                        <col style="width: 30%;">
                        <col style="width: 5%;">
                        <col style="width: 5%;">
                        <col style="width: 5%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>이름</th>
                            <th>등록 날짜</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $searchDataCount = $result -> num_rows;

                            if($searchDataCount > 0) {
                                for($count = 1; $count <= $searchDataCount; $count++) {
                                    echo "<tr>
                                    <td>".$boardInfo['boardID']."</td>
                                    <td class='title'>".$boardInfo['title']."</td>
                                    <td>".$boardInfo['youName']."</td>
                                    <td>".$boardInfo['regTime']."</td>
                                    <td>".$boardInfo['boardView']."</td>
                                </tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div class="board__page">
                    <ul>
                        <li><a href="#">처음</a></li>

                        <li><a href="#">이전</a></li>

                        <li><a href="#">1</a></li>

                        <li><a href="#">2</a></li>

                        <li><a href="#">3</a></li>

                        <li><a href="#">4</a></li>

                        <li><a href="#">5</a></li>

                        <li><a href="#">다음</a></li>

                        <li><a href="#">마지막</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- footer php -->
    <?php
    include "../include/footer.php";
    ?>
</body>
</html>