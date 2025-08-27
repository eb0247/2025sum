<?php
session_start();
session_unset();   // 세션 변수 모두 해제
session_destroy(); // 세션 자체 삭제

echo "<script>alert('세션이 종료되었습니다.'); location.href='index.php';</script>";
?>
