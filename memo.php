<?php
include "inc_head.php";

// 숨겨진 메모 초기화
if (!isset($_SESSION['hidden_memo'])) {
    $_SESSION['hidden_memo'] = "아이디: 비밀번호";
}

// 일반 메모 배열 초기화
if (!isset($_SESSION['memos'])) {
    $_SESSION['memos'] = [];
}

// hidden_memo 출력 여부 확인
$show_hidden = $_SESSION['show_hidden'] ?? false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메모 확인</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="nav-left">맛있는 에그타르트</div>
    <?php if (isset($_SESSION['user_name'])): ?>
      <span>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
      <button onclick="location.href='logout.php'">LOG OUT</button>
    <?php else: ?>
      <button onclick="location.href='login.php'">LOG IN</button>
      <button onclick="location.href='index.php'">메인화면</button>

    <?php endif; ?>
</header>

<main>
    <div class="buttons">
        <!-- 입력 폼은 memo_xss.php로 POST -->
        <form action="memo_xss.php" method="POST">
            <input type="text" name="memo" required>
            <button type="submit">메모하기</button>
        </form>
    </div>

    <!-- hidden_memo 출력 -->
    <?php if ($show_hidden): ?>
        <h3>숨겨진 메모:</h3>
        <p><?= $_SESSION['hidden_memo'] ?></p>
        <?php $_SESSION['show_hidden'] = false; // 출력 후 플래그 초기화 ?>
    <?php endif; ?>

    <h2>메모 목록</h2>
    <ul>
        <?php foreach ($_SESSION['memos'] as $m): ?>
            <li><?= htmlspecialchars($m) ?></li>
        <?php endforeach; ?>
    </ul>
</main>
</body>
</html>
