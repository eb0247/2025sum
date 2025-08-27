<?php
include "inc_head.php";
include "data.php";

if (!isset($_SESSION['user_id'])) {
    // 로그인 안 했으면 error.php로 리다이렉트
    header("Location: error.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>2025 Summer 해캠</title>
    <link rel="stylesheet" href="/25sum/style2.css">
</head>
<body>
  <div class="container">
    <div class="left-side">
      <h1>대량 주문 메뉴얼</h1>
      <h2>오늘도 저희 매장을 이용해주셔서 감사합니다. 대량 주문 제작에는 최소 7일이 소요되니 이 점 유의하여 예약해주시면 감사합니다.<br>Thank you for visiting our store today. Please note that bulk orders take at least seven days to manufacture, so please keep this in mind when making your reservation. We will always strive to be the best store we can be. Thank you.</h2>
      <div class="buttons">
        <form action="problem.php" method="POST">
          <input type="text" name="url" placeholder="입력하세요" required>
          <button type="submit">등록</button>
          <button onclick="location.href='index.php'">메인화면</button>
        </form>
      </div>
    </div>

    <div class="right-side">
      <img src="/25sum/upload_back.png">
    </div>
  </div>
</body>

</html>
