
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>파일 업로드</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <div class="nav-left">맛있는 에그타르트</div>
      <div class="nav-right">
        <?php if (isset($_SESSION['user_name'])): ?>
          <span>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
        <?php else: ?>
          <button onclick="location.href='login.php'">LOG IN</button>
          <button onclick="location.href='index.php'">메인화면</button>
        <?php endif; ?>
      </div>
    </header>

    <main>
      <h1>이미지 파일 업로드</h1>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
          <label for="title">제목:</label>
          <input type="text" id="title" name="title" required>
        </div>
        <div>
          <label for="file">파일 선택:</label>
          <input type="file" id="file" name="upload_file" required>
        </div>
        <div class="buttons">
          <button type="submit">업로드</button>
        </div>
      </form>
    </main>
  </body>
</html>
