<header id="header">
        <section class="header__wrap white">
            <div class="headerLogo">PICS</div>
            <div class="middleMenu">
                <ul>
                    <li><a href="../mainPage/service.php">Service</a></li>
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