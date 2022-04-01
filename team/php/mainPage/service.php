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
    <title>Pics</title>
<?php
    include "../include/service.php";

?>
    <style>
        /* header */

    * {
        margin: 0;
        padding: 0;
    }

    #service1 {
        width: 100%;
        height: 110vh;
        background: #582524;
        /* background: url(../../html/assets/img/main/service/background.jpg); */
        background-repeat: no-repeat;
        background-size: cover;
    }


    #header {
        width: 100%;
        font-family: 'Poppins';
        font-weight: 1000;
        /* background-color: blue; */
    }
    .header__wrap {
        padding: 20px 0;
        height: 60px;
        display: flex;
    }

    #header .headerLogo {
        flex: 0 0 20%;
        font-size: 24px;
        padding-top: 11px;
        text-align: left;
        margin-left: 20px;
    }

    #header .middleMenu {
        flex: 0 0 50%;
        padding-top: 15px;
    }

    #header .middleMenu ul {
        margin-top: 1px;
        display: flex;
        justify-content: space-evenly;
    }
    #header .middleMenu li a {
        font-size: 20px;
        font-weight: 600;
        color: #fff;
    }

    #header .SignIn {
        flex: 0 0 28%;
        margin-top: 10px;
    }

    #header .SignIn .text {
        border: 0;
        padding: 5px 20px;
        background-color: #9891E7;
    }


    #header .SignIn a {
        float: right;
        padding: 5px 20px;
        border-radius: 30px;
        border: 1px solid #fff;
        background-color: rgba(255, 255, 255, 0.3);
        text-decoration: none;
        font-weight: 1000;
        color: #fff;
        text-align: right;
        margin-right: 20px;
    }

    .white {
        color: #fff;
    }


    #header .SignIn .setting {
        border: 0;
    }
    #header .SignIn .setting svg {
        vertical-align: -5px;
        padding-right: 5px;
    }



    /* section1 */
    #section1 {
        width: 100%;
        height: calc(110vh - 100px);
        /* background-color: rgba(0,0,0,0.2); */
    }
    

    .section1__Container {
        display: flex;
        text-align: center;
        padding-top: 10vh;
        
    }

    .section1__Container .title {
        text-align: right;
        color: #fff;
        font-size: 4vw;
        font-weight: bold;
        white-space: nowrap;
    }

    .textBox {
        margin-left: 11vw;
        margin-top: 10vh;
    }

    .textBox a {
        color: #000;
        background: #fff;
        padding: 1vh 2vw;
        font-size: 1.5vw;
        text-decoration: none;
        float: right;
        border-radius: 30vw;
        margin-top: 4vh;
        opacity: 0.5;
    }
    .textBox a:hover {
        opacity: 0.8;
    }

    .imageBox {
        margin-left: 5vw;
        width: 45vw;
        height: 50vh;
        overflow: hidden;
        position: relative;
        background: #eee;
        margin-top: 5vh;
    }

    .imageBox img {
        position: absolute;
        left: 50%; top: 50%;
        transform: translate(-50%, -50%) scale(1.3);
    }

    /* section2 */
    #section2 {
        width: 100%;
        height: 120vh;
        background-color: #f8f8f8;
    }
    .section2__head {
        text-align: center;
    }
    .section2__head h2 {
        color: gray;
        font-size: 5vw;
        font-weight: lighter;
        padding-top: 15vh;
    }
    .section2__head h2 span {
        color: #000;
        font-weight: normal;
    }
    .section2__head p {
        color: gray;
        font-weight: lighter;
        font-size: 2vw;
        margin-bottom: 10vh;
    }
    .section2__head .line {
        width: 60vw;
        height: 0.3vh;
        background-color: lightgray;
        display: inline-block;
        text-align: center;
        position: relative;
    }
    .section2__head .line .circle {
        display: inline-block;
        width: 15vh;
        height: 15vh;
        border-radius: 50%;
        background: #A5BDFB;
        position: absolute;
        right: -14vh; bottom: -5vh;
        opacity: 0.8;
    }

    .section2__body {
        display: flex;
    }

    .section2__body .desc {}

    .section2__body .desc .mouseDrag {
        font-size: 8vh;
        margin-left: 10vh;
        text-align: center;
        width: 35vh;
        height: 35vh;
        border-radius: 50%;
        background-color: #A5BDFB;
        color: #fff;
        line-height: 35vh;
        margin-right: 5vh;
        margin-top: 10vh;

    }
    .section2__body .photos {
        margin-top: 10vh;
        white-space: nowrap;
        overflow: hidden;
        border: 1px solid #000;
    }
    .section2__body .photos .photo {
        display: inline-block;
        width: 30vh;
        height: 35vh;
        background-color: #000;
        border-radius: 1vh;
        margin-left: 3vh;
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    .section2__body .photos .photo1 {
        background-image: url(../../html/assets/img/main/service/gal1.jpg);
        
    }
    .section2__body .photos .photo2 {
        background-image: url(../../html/assets/img/main/service/gal2.jpg);
    }
    .section2__body .photos .photo3 {
        background-image: url(../../html/assets/img/main/service/gal3.jpg);
    }
    .section2__body .photos .photo4 {
        background-image: url(../../html/assets/img/main/service/gal4.jpg);
    }

    </style>
</head>
<body>
    <section id="service1">
        <header id="header">
            <section class="header__wrap white">
                <div class="headerLogo">PICS</div>
                <div class="middleMenu">
                    <ul>
                        <li><a href="service.php">Service</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="../board/contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="SignIn">
                    <?php if(isset($_SESSION['memberID'])) { ?>
                        <a href="../login/logout.php">Log out</a>
                        <a href="../myPage/myPage.php" class="setting">  
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.8541 8C3.83011 8 3 8.83011 3 9.8541V14.8571C3 16.8619 3 17.8643 3.45983 18.5961C3.69961 18.9777 4.02229 19.3004 4.4039 19.5402C5.13571 20 6.1381 20 8.14286 20H15.8571C17.8619 20 18.8643 20 19.5961 19.5402C19.9777 19.3004 20.3004 18.9777 20.5402 18.5961C21 17.8643 21 16.8619 21 14.8571V9.8541C21 8.83011 20.1699 8 19.1459 8C18.4436 8 17.8016 7.60322 17.4875 6.97508L16.6667 5.33333L16.6666 5.33329C16.5567 5.1134 16.5017 5.00345 16.4394 4.90782C16.1141 4.40882 15.5833 4.08078 14.9915 4.01299C14.8781 4 14.7552 4 14.5093 4H9.49071C9.24484 4 9.1219 4 9.00848 4.01299C8.41668 4.08078 7.8859 4.40882 7.56062 4.90782C7.49827 5.00346 7.44329 5.11342 7.33333 5.33333L6.51246 6.97508C6.19839 7.60322 5.55638 8 4.8541 8ZM14 13C14 14.1046 13.1046 15 12 15C10.8954 15 10 14.1046 10 13C10 11.8954 10.8954 11 12 11C13.1046 11 14 11.8954 14 13ZM16 13C16 15.2091 14.2091 17 12 17C9.79086 17 8 15.2091 8 13C8 10.7909 9.79086 9 12 9C14.2091 9 16 10.7909 16 13Z" fill="#9B5FE8"/>
                            </svg>    
                        <?=$_SESSION['youName']?>님</a>

                <?php } else { ?>
                    <a href="../login/join.php">Sign up</a>
                    <a href="../login/login.php">Sign in</a>
                <?php } ?>
                </div>
            </section>
        </header>
        <section id="section1">
            <div class="section1__Container">
                <div class="textBox">
                    <div class="title">웹 앨범 만들때는<br>쉽고 안전한<br> PICS에서</div>
                    <a href="#c" class="textbox_btn">contact us</a>
                </div>
                <div class="imageBox">
                    <img src="../../html/assets/img/main/service/album.jpg" alt="album">
                </div>
            </div>
        </section>
    </section>

    <section id="section2">
        <div class="section2__head">
            <h2>Photo <span>Gallery</span></h2>
            <p>추억과 기억들을 사진으로 모아<br>웹에서 간직해보세요.</p>
            <span class="line"><span class="circle"></span></span>
        </div>
        <div class="section2__body">
            <article class="desc">
                <p class="mouseDrag">Drag!</p>
            </article>
            <article class="photos">
                <div class="photo1 photo"></div>
                <div class="photo2 photo"></div>
                <div class="photo3 photo"></div>
                <div class="photo4 photo"></div>
            </article>
        </div>
    </section>
</body>
</html>