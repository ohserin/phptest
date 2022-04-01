<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <?php
    include '../include/style.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    body {
        background: #6464cd;
    }
    #board {
        /* background: #fff; */
    }
    .scrollTop {
            position: fixed;
            left: 20px;
            top: 20px;
            background: rgba(0, 0, 0, 0.4);
            color: #fff;
            width: 60px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            z-index: 10000;
        }
     

</style>
</head>
<body>
<?php
    include '../include/header.php';
?>
<!-- //header -->

<main id="main">
<section id="board">
            <div class="board__body">
            <div class="contact">
                        <!-- <span>How may I help you?</span> -->
                       <h2>What help do you need?</h2>
                   </div>
               
                   <div class="contents">
                       <div class="box">
                           <div class="left">
                              <a href="boardInquiry.php"> <img src="" alt="문의"></a>
                           </div>
                           <div class="right">
                           <a href="request.php">  <img src="" alt="의뢰"></a>
                           </div>
                       </div>
            </div>
        </section>
    </main>
    <div class="scrollTop">0</div>

    <script type="text/javascript" src="../../html/assets/js/skrollr.min.js"></script>
    <script type="text/javascript">


       
        function scroll() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || window.scrollY;
            document.querySelector(".scrollTop").innerText = Math.round(scrollTop);

            requestAnimationFrame(scroll);
        }
        scroll();
    </script>
   
</body>
</html>