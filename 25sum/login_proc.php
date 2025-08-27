<?php
session_start();
include "data.php"; // DB 연결 포함

// POST 데이터 가져오기
$id = isset($_POST['id']) ? $_POST['id'] : '';
$password = isset($_POST['pw']) ? $_POST['pw'] : '';

// --- ID는 문자열 비교로만 확인 ---
if ($id === "egg_bread") {
    // 비밀번호만 DB에서 조회
    // id는 안전하게, pw는 직접 문자열 삽입 → SQL 인젝션 가능
    $sql = "SELECT * FROM users WHERE id = ? AND password = '$password'";
    $stmt = mysqli_prepare($db_conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id); // id만 안전하게 바인딩
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // 세션 저장
        $_SESSION['user_id']   = $row['id'];
        $_SESSION['user_name'] = $row['id'];

        echo "<script>alert('egg_bread 계정으로 로그인 성공!'); location.href='index.php';</script>";
    } else {
        echo "<script>alert('로그인 실패!'); history.back();</script>";
    }

    // DB 연결 종료
    mysqli_close($db_conn);
} else {
    echo "<script>alert('로그인 실패!'); history.back();</script>";
}
?>
