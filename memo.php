<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>메모 확인</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <div class="nav-left">맛있는 에그타르트</div>
      <div class="nav-right">
        <?php if (isset($_SESSION['user_name'])): ?>
          <span>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
          <button onclick="location.href='logout.php'">LOG OUT</button>
        <?php else: ?>
          <button onclick="location.href='login.php'">LOG IN</button>
          <button onclick="location.href='index.php'">메인화면</button>
        <?php endif; ?>
      </div>
    </header>

    <main>



      <?php
      if (isset($_GET['quantity'])) {
          $quantity = intval($_GET['quantity']);
          echo "<p>주문한 수량: " . htmlspecialchars($quantity) . "</p>";
      } else {
      ?>

      <?php
      }
      ?>
    </main>
  </body>
</html>
