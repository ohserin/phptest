<header id="header">
        <h1 class="logo">
            <a href="../pages/main.php">PHP <em>class</em></a>
        </h1>
        <nav class="menu">
            <h2 class="ir_so">메인 메뉴</h2>
            <ul>
                <li><a href="../login/join.php">회원가입</a></li>
                <li><a href="../comment/comment.php">댓글</a></li>
                <li><a href="../board/board.php">게시판</a></li>
                <li><a href="../blog/blog.php">블로그</a></li>
                <li><a href="#">관리자</a></li>
            </ul>
        </nav>
        <div class="member">
            <span class="ir_so">회원 정보 영역</span>
            <?php if(isset($_SESSION['memberID'])){ ?>
                    <a href="../mypage/mypage.php" class="setting">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="mask0_1_955" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="30" height="30">
                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white"/>
                        </mask><g mask="url(#mask0_1_955)">
                        <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="#414141"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 30.076H26.154V26.523C26.154 25.35 25.352 23.866 24.372 23.226L18.937 19.926C18.512 19.673 18.024 19.306 18.024 18.233C18.024 17.53 18.617 16.973 18.796 16.753C19.6683 15.8065 20.1517 14.5661 20.15 13.279V10.646C20.15 7.79199 17.846 6.15399 15 6.15399C12.153 6.15399 9.84799 7.79199 9.84799 10.646V13.279C9.84799 14.623 10.365 15.838 11.204 16.753C11.382 16.973 11.975 17.53 11.975 18.233C11.975 19.307 11.487 19.673 11.062 19.925L5.62599 23.226C4.64699 23.866 3.84599 25.35 3.84599 26.523V30.076H15Z" fill="#595959"/>
                </g>
            </svg>
                    <?=$_SESSION['youName']?>님 환영합니다.</a>
                    <a href="../login/logout.php">로그아웃</a>
             <?php   } else { ?>
                    <a href="../login/join.php">회원가입</a>
                    <a href="../login/login.php">로그인</a>
             <?php } ?>
        </div>
            
            

    </header>