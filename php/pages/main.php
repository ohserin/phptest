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
    <title>PHP 사이트</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
<?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center type">
            <div class="container">
            <?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
                ?>
                <h3 class="section__title">새로운 나무</h3>
                <p class="section__desc">강의와 관련된 블로그입니다. 다양한 정보를 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__cont">

                    <?php
    $sql = "SELECT * FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT 3";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $blog){ ?>
    <article class="blog">
        <figuer class="blog__header" aria-hidden="true">
            <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>)"></a>
        </figuer>
        <div class="blog__body">
            <span class="blog__cate"><?=$blog['blogCategory']?></span>
            <div class="blog__title"><?=$blog['blogTitle']?></div>
            <div class="blog__desc"><?=$blog['blogContents']?></div>
            <div class="blog__info">
                <span class="author"><?=$blog['blogAuthor']?></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
            </div>
        </div>
    </article>
<?php } ?>
                       
                    </div>
                    <div class="blog__btn">
                        <a href="#">더 보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog type -->
        <section id="notice-type" class="section center gray">
        <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">나무와 관련된 새로운 소식입니다. 새로운 나무 정보를 확인하세요!</p>
                <div class="notice__inner">
                    <?php
                       $sql = "SELECT * FROM myBoard ORDER BY boardID DESC LIMIT 4";
                       $result = $connect -> query($sql);
                    ?>
                    <article class="notice">
                        <h4>나무소식</h4>
                        <ul>
                            <?php foreach($result as $myBoard){ ?>
                            <li><a href="../board/boardView.php?boardID=<?=$myBoard['boardID']?>"><?=$myBoard['boardTitle']?></a><span class="time"><?=date('Y-m-d', $myBoard['regTime'])?></span></li>
                            <?php } ?>
                        </ul>
                        <a href="../board/board.php" class="more">더보기</a>
                    </article>
                     <article class="notice">
                         <h4>댓글</h4>
                         <ul>
                            <?php
                                $sql = "SELECT * FROM myComment ORDER BY commentID DESC LIMIT 4";
                                $result = $connect -> query($sql);
                            ?>
                             <?php foreach($result as $myComment){ ?>
                             <li><a href="../comment/comment.php"><?=$myComment['youText']?></a><span class="time"><?=date('Y-m-d', $myComment['regTime'])?></span></li>
                             <?php } ?>
                         </ul>
                         <a href="../comment/comment.php" class="more">더보기</a>
                     </article>
                </div>
            </div>
        </section>
        <!-- //notice-type -->
    </main>
    <!-- //main -->

    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>