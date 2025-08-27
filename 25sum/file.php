<?php
session_start();

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name']; // 원본 파일명만 가져오기
    $safeName = htmlspecialchars($fileName, ENT_QUOTES); // 따옴표도 안전하게 처리
   echo "<script>alert('파일 업로드 완료: {$safeName}');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>위시 디저트</title>
    <link rel="stylesheet" href="/25sum/style2.css">

</style>
</head>
<body>
  <div class="container">
    <div class="left-side">
    <h1>포장 추천 메뉴</h1>
    <div class="buttons">
    <button onclick="location.href='index.php'">메인화면</button>
  </div>

  <h2>
    에그타르트 3000원<br>
    얼그레이 마카롱 2000원<br>
    생크림 케이크 23000원<br>
    아몬드 쿠키 2500원<br>
    블루베리 머핀 3500원
  </h2>
  <div class="buttons">

    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file-upload" required hidden>
    <label for="file-upload" class="btn">파일 선택</label>

    <button type="submit">등록</button>
</form>


  </div>
</div>

  <div class="right-side">
    <img src="/25sum/file_back2.png">
  </div>
</body>


</html>
