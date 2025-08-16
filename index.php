<?php

// inc_head.php 안전하게 포함
include __DIR__ . "/inc_head.php";

// 현재 세션 내용 출력 (테스트용)
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>2025 Summer 해캠</title>
    <!-- CSS 경로 안전하게 -->
    <link rel="stylesheet" href="/25sum/style.css">
  </head>
  <body>
    <header>
      <div class="nav-left">맛있는 에그타르트</div>
      <div class="nav-right">
        <?php if (isset($_SESSION['user_name'])): ?>
          <span>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
          <button onclick="location.href='logout.php'">LOG OUT</button>
        <?php else: ?>
          <button onclick="location.href='file.php'">파일 업로드</button>
          <button onclick="location.href='url.php'">이미지 요청</button>
          <button onclick="location.href='memo.php'">메모 기록/확인</button>
        <?php endif; ?>
      </div>
    </header>
    <main>
      <!-- 이미지 경로 안전하게 -->
      <img src="/25sum/타르트.jpg" class="egg-tart">
      <p>수량을 입력하세요</p>
      <div class="buttons">
        <form action="memo.php" method="get">
          <input type="number" name="quantity" placeholder="수량" required>
          <button type="submit">주문하기</button>
        </form>
        <div class="buttons">
          <form action="problem.php" method="POST">
            <input type="text" name="url" placeholder="url" required>
            <button type="submit">실행</button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>
