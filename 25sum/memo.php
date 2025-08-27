<?php

include "inc_head.php";
include "data.php";
// 숨겨진 메모 초기화
if (!isset($_SESSION['hidden_memo'])) {
    $_SESSION['hidden_memo'] = "ID:egg_bread";
}

// 일반 메모 배열 초기화
if (!isset($_SESSION['memos'])) {
    $_SESSION['memos'] = [];
}

// 마지막 메모 가져오기
$last_memo = !empty($_SESSION['memos']) ? $_SESSION['memos'][count($_SESSION['memos']) - 1] : "아직 메모가 없습니다.";

// 숨겨진 메모 출력 여부
$show_hidden = $_SESSION['show_hidden'] ?? false;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>메모 게시판</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="body-memo">


  <h1 class="board-title">게시판</h1>


<div class="container">
    <!-- 왼쪽: 누적 메모 목록 -->
    <div class="memo-list">
        <?php if ($show_hidden): ?>
            <p><?= $_SESSION['hidden_memo'] ?></p>
            <?php $_SESSION['show_hidden'] = false; ?>
        <?php endif; ?>

        <ul>
            <?php foreach ($_SESSION['memos'] as $m): ?>
                <li><?= $m ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- 오른쪽: 입력폼 -->
<div class="side">
  <form id="memo-form" action="memo_xss.php" method="POST" class="memo-form">
  <textarea name="memo" required placeholder="메모를 입력하세요"></textarea>
</form>
<button type="submit" form="memo-form">메모하기</button>
<button onclick="location.href='index.php'">메인 화면</button>

</div>

</div>
</body>
</html>
