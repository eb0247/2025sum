<?php
// inc_head.php 안전하게 포함
include __DIR__ . "/inc_head.php";
include "data.php";

if (!isset($_SESSION['valid_destination']) || $_SESSION['valid_destination'] !== true) {
    // 세션이 없으면 guide.php로 이동
    header("Location: guide.php");
    exit;
}


// 현재 세션 내용 출력 (테스트용)

$logged_in = isset($_SESSION['user_name']); // 로그인 여부 확인
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>2025 Summer 해캠</title>
    <link rel="stylesheet" href="/25sum/style.css">
    <style>
  /* 화면 전체를 덮는 배경 */
  body {
    margin: 0; /* 기본 여백 제거 */
    height: 100vh; /* 화면 높이 100% */
    background-image: url('/25sum/index_back.png');
    background-size: cover; /* 이미지가 화면에 맞게 확대/축소 */
    background-position: center; /* 중앙 정렬 */
    background-repeat: no-repeat; /* 반복 방지 */
  }
</style>
  </head>
  <body>


    <main>

    </main>
    <footer>
      <?php if ($logged_in): ?>

      <?php endif; ?>

      <button onclick="location.href='file.php'">위시 디저트</button>

      <?php if (!$logged_in): ?>
        <button onclick="location.href='login.php'">로그인</button>
      <?php endif; ?>

      <button onclick="location.href='memo.php'">게시판</button>

      <!-- 대량 주문 버튼 -->
      <button onclick="goUpload()">대량 주문</button>

      <!-- 개발 확인용 세션 종료 버튼 -->

    </footer>

    <script>
      // PHP 변수 -> JS에 전달
      var loggedIn = <?= $logged_in ? 'true' : 'false' ?>;

      function goUpload() {
        if (loggedIn) {
          location.href = 'upload.php';
        } else {
          location.href = 'error.php';
        }
      }
    </script>
  </body>
</html>
