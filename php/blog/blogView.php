<?php
 include "../connect/connect.php";
 include "../connect/session.php";
//  include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>
    <?php
        include "../include/style.php";
    ?>
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
<?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->

<?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="center">
<?php
    $blogID = $_GET['blogID'];
    $sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
    $result = $connect -> query($sql);
    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>

<?php foreach($result as $blog){ ?>
        <div class="blog__label" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>)">
                    <h3 class="section__title"><?=$blog['blogTitle']?></h3>
                    <div>
                <span class="author"><a href="#"><?=$blog['blogAuthor']?></a></span>
                <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span><br>
                <span class="modify"><a href="#">수정</a></span>
                <span class="delete"><a href="#">삭제</a></span>
                        </div>
                    </div>
<?php } ?>
        <div class="container">
                <div class="blog__layout">
                    <div class="blog__left">
                       <h4><?=substr($blogInfo['blogTitle'],1,10)?></h4>
                    </div>
                    <div class="blog__right">
                        <div class="ad">
                        <iframe src="https://ads-partners.coupang.com/widgets.html?id=572083&template=carousel&trackingCode=AF0730460&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                        </div>
                    </div>
                </div>
             </div>
            </section>
        </main>

            <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    
</body>
</html>