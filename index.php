
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Review</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <div class="nav-left">맛있는 에그타르트</div>
      <div class="nav-right">
        <?php if (isset($_SESSION['user_name'])): ?>

          <span>Welcome, <?= $_SESSION['user_name'] ?></span>
          <button onclick="location.href='logout.php'">LOG OUT</button>
        <?php else: ?>




          <button onclick="location.href='file.php'">파일 업로드</button>
          <button onclick="location.href='url.php'">이미지 요청</button>
          <button onclick="location.href='memo.php'">메모 기록/확인</button>
        <?php endif; ?>
      </div>
    </header>
    <main>
      <img src="타르트.jpg" class="egg-tart">
      <p>수량을 입력하세요</p>
      <div class="buttons">
        <form action="memo.php" method="get">
          <input type="number" name="quantity" placeholder="수량" required>
          <button type="submit">주문하기</button>
        </form>
      </div>
    </main>
  </body>
</html>
