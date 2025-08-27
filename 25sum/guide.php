<?php
include "inc_head.php";
include "data.php";

// 폼 전송 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['memo']);
    $correct = "서울시 fnrai로 qjcijlr길 43242342지"; // 정답

    if ($input === $correct) {
      $_SESSION['valid_destination'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "목적지가 올바르지 않습니다.";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>길 안내</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Noto Sans', sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f5b740 url('<?= 'dee99275-9905-43e1-9958-d81d822616db.png' ?>') no-repeat center center;
      background-size: cover;
      flex-direction: column;
    }
    .title-box {
      background: #fff;
      padding: 20px 40px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 5px 5px 0px #333;
      margin-bottom: 40px;
    }
    .title-box h1 {
      margin: 0;
      font-size: 32px;
    }
    .title-box p {
      margin: 5px 0 0 0;
      font-style: italic;
      font-size: 16px;
    }
    .buttons form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      width: 250px;
      border-radius: 6px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 6px;
      border: none;
      background: #fff;
      color: #333;
      box-shadow: 5px 5px 0px #333;
      cursor: pointer;
    }
    button:hover {
      background: #f0f0f0;
    }
    .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <!-- 제목 박스 -->
  <!----목적지:서울시 fnrai로 qjcijlr길 43242342지--->
  <div class="title-box">
    <h1>길찾기</h1>
  </div>

  <!-- 입력 폼 -->
  <div class="buttons">
    <form action="guide.php" method="POST">
      <input type="text" name="memo" required placeholder="목적지를 입력하세요">
      <button type="submit">찾기</button>
    </form>
    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
  </div>

</body>
</html>
