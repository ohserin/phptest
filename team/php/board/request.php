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
    include '../include/headerblue.php';
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
                <h3 class="section__title">의뢰하기</h3>
                <p class="section__desc mt30">웹 앨범을 만들어 볼까요?</p>
                <div class="board__inner">     
                    <div class="board__modify">
                        <form action="requestSave.php" name="request" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">의뢰하기 영역</legend>
                                <div class="mb30 toggle__layout">
                                    <label for="selectLayout" class="mb20">레이아웃 설정</label>
                                    <div class="selection">
                                        <div>
                                            <input type="radio" name="selectLayout" id="selectLayout1" value="기본형">
                                            <label for="selectLayout1" class="mb20">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 4.5C2.25 3.25736 3.25736 2.25 4.5 2.25H19.5C20.7427 2.25 21.75 3.25737 21.75 4.5V19.5C21.75 20.7427 20.7427 21.75 19.5 21.75H4.5C3.25737 21.75 2.25 20.7427 2.25 19.5V4.5ZM4.5 3.75C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08578 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08578 19.9142 3.75 19.5 3.75H4.5Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 9C5.75 7.20509 7.20509 5.75 9 5.75C10.7949 5.75 12.25 7.20509 12.25 9C12.25 10.7949 10.7949 12.25 9 12.25C7.20509 12.25 5.75 10.7949 5.75 9ZM9 7.25C8.03351 7.25 7.25 8.03351 7.25 9C7.25 9.96649 8.03351 10.75 9 10.75C9.96649 10.75 10.75 9.96649 10.75 9C10.75 8.03351 9.96649 7.25 9 7.25Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9983 12.4425C15.2846 12.1849 15.7195 12.186 16.0045 12.445L21.5045 17.445C21.811 17.7237 21.8336 18.198 21.555 18.5045C21.2764 18.811 20.802 18.8336 20.4955 18.555L15.4975 14.0113L11.0018 18.0575C10.7217 18.3095 10.298 18.3147 10.012 18.0694L6.96874 15.461L3.45004 18.1C3.11867 18.3485 2.64857 18.2814 2.40004 17.95C2.15152 17.6186 2.21867 17.1485 2.55004 16.9L6.55004 13.9C6.83126 13.6891 7.22124 13.7018 7.48814 13.9306L10.488 16.5018L14.9983 12.4425Z" fill="#1C1B1E"/>
                                                </svg>
                                            </label>
                                            <p for="selectLayout1" class="mb20">기본형</p>
                                        </div>
                                        <div>
                                            <input type="radio" name="selectLayout" id="selectLayout2" value="인스타그램">
                                            <label for="selectLayout2" class="mb20">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 7C2.25 4.37665 4.37665 2.25 7 2.25H17C19.6234 2.25 21.75 4.37665 21.75 7V17C21.75 19.6234 19.6234 21.75 17 21.75H7C4.37665 21.75 2.25 19.6234 2.25 17V7ZM7 3.75C5.20507 3.75 3.75 5.20507 3.75 7V17C3.75 18.7949 5.20507 20.25 7 20.25H17C18.7949 20.25 20.25 18.7949 20.25 17V7C20.25 5.20507 18.7949 3.75 17 3.75H7Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 12C7.25 9.37664 9.37664 7.25 12 7.25C14.6234 7.25 16.75 9.37664 16.75 12C16.75 14.6234 14.6234 16.75 12 16.75C9.37664 16.75 7.25 14.6234 7.25 12ZM12 8.75C10.2051 8.75 8.75 10.2051 8.75 12C8.75 13.7949 10.2051 15.25 12 15.25C13.7949 15.25 15.25 13.7949 15.25 12C15.25 10.2051 13.7949 8.75 12 8.75Z" fill="#1C1B1E"/>
                                                    <path d="M17.5 7.5C18.0523 7.5 18.5 7.0523 18.5 6.5C18.5 5.9477 18.0523 5.5 17.5 5.5C16.9477 5.5 16.5 5.9477 16.5 6.5C16.5 7.0523 16.9477 7.5 17.5 7.5Z" fill="#1C1B1E"/>
                                                </svg>
                                            </label>
                                            <p for="selectLayout2" class="mb20">인스타그램</p>
                                        </div>
                                        <div>
                                            <input type="radio" name="selectLayout" id="selectLayout3" value="가로정렬">
                                            <label for="selectLayout3" class="mb20">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 3.75C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75H4.5ZM2.25 4.5C2.25 3.25736 3.25736 2.25 4.5 2.25H19.5C20.7426 2.25 21.75 3.25736 21.75 4.5V19.5C21.75 20.7426 20.7426 21.75 19.5 21.75H4.5C3.25736 21.75 2.25 20.7426 2.25 19.5V4.5Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 14C2.25 13.5858 2.58579 13.25 3 13.25H12C12.4142 13.25 12.75 13.5858 12.75 14C12.75 14.4142 12.4142 14.75 12 14.75H3C2.58579 14.75 2.25 14.4142 2.25 14Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 10C11.25 9.58579 11.5858 9.25 12 9.25H21C21.4142 9.25 21.75 9.58579 21.75 10C21.75 10.4142 21.4142 10.75 21 10.75H12C11.5858 10.75 11.25 10.4142 11.25 10Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 11.75C3.41421 11.75 3.75 12.0858 3.75 12.5V15.5C3.75 15.9142 3.41421 16.25 3 16.25C2.58579 16.25 2.25 15.9142 2.25 15.5V12.5C2.25 12.0858 2.58579 11.75 3 11.75Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 7.75C21.4142 7.75 21.75 8.08579 21.75 8.5V11.5C21.75 11.9142 21.4142 12.25 21 12.25C20.5858 12.25 20.25 11.9142 20.25 11.5V8.5C20.25 8.08579 20.5858 7.75 21 7.75Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V21C12.75 21.4142 12.4142 21.75 12 21.75C11.5858 21.75 11.25 21.4142 11.25 21V3C11.25 2.58579 11.5858 2.25 12 2.25Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75 3C9.75 2.58579 10.0858 2.25 10.5 2.25H13.5C13.9142 2.25 14.25 2.58579 14.25 3C14.25 3.41421 13.9142 3.75 13.5 3.75H10.5C10.0858 3.75 9.75 3.41421 9.75 3Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75 21C9.75 20.5858 10.0858 20.25 10.5 20.25H13.5C13.9142 20.25 14.25 20.5858 14.25 21C14.25 21.4142 13.9142 21.75 13.5 21.75H10.5C10.0858 21.75 9.75 21.4142 9.75 21Z" fill="#1C1B1E"/>
                                                </svg>
                                            </label>
                                            <p for="selectLayout3" class="mb20">가로정렬</p>
                                        </div>
                                        <div>
                                            <input type="radio" name="selectLayout" id="selectLayout4" value="세로정렬">
                                            <label for="selectLayout4" class="mb20">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 2.25C11.9142 2.25 12.25 2.58579 12.25 3L12.25 10C12.25 10.4142 11.9142 10.75 11.5 10.75L3 10.75C2.58579 10.75 2.25 10.4142 2.25 10L2.25 3C2.25 2.58579 2.58579 2.25 3 2.25L11.5 2.25ZM10.75 3.75L3.75 3.75L3.75 9.25L10.75 9.25L10.75 3.75Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 13.25C21.4142 13.25 21.75 13.5858 21.75 14V21C21.75 21.4142 21.4142 21.75 21 21.75H12.5C12.0858 21.75 11.75 21.4142 11.75 21L11.75 14C11.75 13.5858 12.0858 13.25 12.5 13.25L21 13.25ZM20.25 14.75L13.25 14.75L13.25 20.25H20.25V14.75Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 10.75C15.0858 10.75 14.75 10.4142 14.75 10V3C14.75 2.58579 15.0858 2.25 15.5 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V10C21.75 10.4142 21.4142 10.75 21 10.75H15.5ZM16.25 9.25H20.25V3.75H16.25V9.25Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 21.75C2.58579 21.75 2.25 21.4142 2.25 21L2.25 14C2.25 13.5858 2.58579 13.25 3 13.25H8.5C8.91421 13.25 9.25 13.5858 9.25 14V21C9.25 21.4142 8.91421 21.75 8.5 21.75H3ZM3.75 20.25H7.75V14.75H3.75L3.75 20.25Z" fill="#1C1B1E"/>
                                                </svg>
                                            </label>
                                            <p for="selectLayout4" class="mb20">세로정렬</p>
                                        </div>
                                        <div>
                                            <input type="radio" name="selectLayout" id="selectLayout5" value="맞춤제작">
                                            <label for="selectLayout5" class="mb20">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4144 5.53151C10.6731 5.20806 11.1451 5.15562 11.4685 5.41438L21.4685 13.4144C21.7755 13.66 21.8408 14.101 21.6181 14.4249L16.1181 22.4249C15.8834 22.7663 15.4165 22.8527 15.0751 22.6181C14.7338 22.3834 14.6473 21.9165 14.882 21.5751L19.9868 14.1499L10.5315 6.58568C10.2081 6.32692 10.1556 5.85495 10.4144 5.53151Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6279 1.34884C9.92155 1.18103 10.2912 1.23053 10.5303 1.46969L12.5303 3.46969C12.7695 3.70884 12.819 4.07847 12.6512 4.37212L8.65119 11.3721C8.53521 11.5751 8.33124 11.7124 8.09956 11.7434C7.86787 11.7744 7.63497 11.6956 7.46968 11.5303L2.46968 6.53035C2.30439 6.36506 2.22562 6.13215 2.25664 5.90047C2.28767 5.66878 2.42495 5.46481 2.6279 5.34884L9.6279 1.34884ZM4.22467 6.16402L7.836 9.77535L11.0646 4.12528L9.87474 2.93541L4.22467 6.16402Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 22C5.25 21.5858 5.58579 21.25 6 21.25H19C19.4142 21.25 19.75 21.5858 19.75 22C19.75 22.4142 19.4142 22.75 19 22.75H6C5.58579 22.75 5.25 22.4142 5.25 22Z" fill="#1C1B1E"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 19.25C8.91421 19.25 9.25 19.5858 9.25 20V22C9.25 22.4142 8.91421 22.75 8.5 22.75C8.08579 22.75 7.75 22.4142 7.75 22V20C7.75 19.5858 8.08579 19.25 8.5 19.25Z" fill="#1C1B1E"/>
                                                </svg>
                                            </label>
                                            <p for="selectLayout5" class="mb20">맞춤제작</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb30">
                                    <label for="requestTitle" class="mb20">앨범의 주제</label>
                                    <input type="text" name="requestTitle" id="requestTitle" placeholder="어떤 앨범인가요?" required>
                                </div>
                                
                                <div class="mb30">
                                    <label for="requestContents" class="mb20">요청사항</label>
                                    <textarea name="requestContents" id="requestContents" placeholder="자세할수록 좋습니다!" required></textarea>
                                </div>
                                
                                <div class="mb30">
                                    <label for="photoUpload" class="mb20">압축파일 업로드(일단 1MB로 제한 걸었습니다.)</label>
                                    <input type="file" name="photoUpload" id="photoUpload" multiple>
                                </div>

                                <div class="mb50">
                                    <button type="submit" value="의뢰하기" class="request-btn mb50">의뢰하기</button>
                                    <a href="requestList.php" class="request-btn mb50">목록보기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
            <!-- //main -->
    
</body>
</html>