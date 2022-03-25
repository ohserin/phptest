<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>
    <?php
        include "../include/style.php";
    ?>
</head>
<body>
<?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->
<?php
        include "../include/header.php";
    ?>

<main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="card-type" class="section center">
            <div class="container">
                <h3 class="section__title">계절별 대표나무</h3>
                <p class="section__desc">
                사계절이 뚜렷하게 나뉘어져 있는 우리나라엔 계절별로 등장하는 나무가 있습니다. <br>
                봄, 여름, 가을에 등장하는 나무를 소개하도록 하겠습니다.
                </p>
                <div class="card__inner">
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img1.jpg" alt="이미지1">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">산수유나무</h3>
                            <p class="card__desc">산지나 인가 부근에서 자라는 산수유나무입니다.
3월에서 4월, 봄이 시작되는 시기에 꽃이 피기 시작하는데요.봄의 이미지를 그대로 형상화한 것처럼 아름답습니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img2.jpg" alt="이미지2">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">참나무</h3>
                            <p class="card__desc">참나무과 참나무속에 속하는 여러 수종을 가리키는 표현이기도 한 참나무!
도토리나무라고 불리기도 하며 4월을 넘어 5월~7월에 핍니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                    <article class="card">
                        <figure class="card__header">
                            <img class="card__img" src="../assets/img/img3.jpg" alt="이미지3">
                        </figure>
                        <div class="card__body">
                            <h3 class="card__title">떡갈나무</h3>
                            <p class="card__desc">가랑잎나무라고도 불리우는 떡갈나무는 산지에서 흔히 자랍니다. 꽃은 양성화이며 주로 10월에 익어 견과의 열매인 도토리 또한 함께 익는답니다.</p>
                            <a class="card__btn" href="#">
                                더 자세히 보기
                                <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- //card-type -->

        <section id="comment-type" class="section center purple">
            <h3 class="section__title">강의 신청하기</h3>
            <p class="section__desc">강의 신청하기는 누구나 댓글을 달 수 있습니다. 회원가입 하지 않아도 신청 가능합니다. 100글자 이내로 써주세요!</p>
            <div class="comment__inner">
                <div class="comment__form">
                    <form action="commentSave.php" method="post" name="comment">
                        <fieldset>
                            <legend class="ir_so">댓글쓰기</legend>
                            <div class="comment__wrap">
                                <div>
                                    <label for="youName" class="ir_so">이름</label>
                                    <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youText" class="ir_so">댓글쓰기</label>
                                    <input type="text" name="youText" id="youText" class="input__style width" placeholder="시간, 날짜, 강의 제목을 적어주세요!" autocomplete="off" required>
                                </div>
                                <button class="comment__btn" type="submit" value="댓글 작성하기">작성하기</button>
                            </fieldset>
                        </div>
                        </form>
                    </div>
                <div class="comment__list">
                <!-- <div class="list">
                        <p class="comment__desc">저 신청할께요!! 5월달 강의 신청합니다.</p>
                        <div class="comment__icon">
                            <span class="face"><img src="../assets/img/face2.png" alt="얼굴"></span>
                            <span class="name">오세린</span>
                            <span class="date">2022-03-11</span>
                        </div>
                    </div> -->
                    <?php
                        include "../connect/connect.php";

                        $sql = "SELECT * FROM myComment";
                        $result = $connect -> query($sql);

                        $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);

                        // echo "<pre>";
                        // var_dump($commentInfo);
                        // echo "</pre>";
                        ?>

                <?php while($commentInfo = $result -> fetch_array(MYSQLI_ASSOC)){ ?>
                    <div class="list">
                        <p class="comment__desc"><?=$commentInfo['youText']?></p>
                        <div class="comment__icon">
                            <span class="face"><img src="../assets/img/face2.png" alt="얼굴"></span>
                            <span class="name"><?=$commentInfo['youName']?></span>
                            <span class="date"><?=date('Y-m-d', $commentInfo['regTime'])?></span>
                        </div>
                    </div>
                    <?php } ?>
                    

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