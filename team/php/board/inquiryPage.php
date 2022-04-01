<?php
    $sql = "SELECT count(boardID) FROM myBoard";
    $result = $connect -> query($sql);

    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount ['count(boardID)'];

    $boardCount = ceil($boardCount/$PageView);

    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    if($startPage < 1) $startPage = 1;


   if($endPage >= $boardCount) $endPage = $boardCount;

   if($page != 1){
    echo "<li><a href='boardInquiry.php?page=1'>처음으로</a></li>";
}
   if($page != 1){
       $prevPage = $page - 1;
       echo "<li><a href='boardInquiry.php?page={$prevPage}'>이전</a></li>";
   }


   for($i=$startPage; $i<=$endPage; $i++){
       $active = "";
       if($i == $page){
        $active = "active";
       }
       echo "<li class='{$active}'><a href='boardInquiry.php?page={$i}'>{$i}</a></li>";
   }

   if($page != $endPage) {
    $nextPage = $page + 1;
    echo "<li><a href='boardInquiry.php?page={$nextPage}'>다음</a></li>";
}

if($page != $endPage){
     echo "<li><a href='boardInquiry.php?page={$boardCount}'>마지막으로</a></li>";
}
   
?>