<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = trim($_POST['title']);

  if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
      mkdir($upload_dir, 0755, true);
    }

    $tmp_name = $_FILES['upload_file']['tmp_name'];
    $name = basename($_FILES['upload_file']['name']);
    $target = $upload_dir . $name;

    if (move_uploaded_file($tmp_name, $target)) {
      echo "업로드 성공!<br>";
      echo "제목: " . htmlspecialchars($title) . "<br>";
      echo "파일 이름: " . htmlspecialchars($name);
    } else {
      echo "파일 이동 실패";
    }
  } else {
    echo "파일이 업로드되지 않았습니다.";
  }
} else {
  echo "잘못된 접근입니다.";
}
?>
