<?php
session_start();
include "data.php";

// 이미 로그인 되어 있다면 메인 페이지로
if (isset($_SESSION['user_id'])) {
    echo "<script>alert('이미 로그인 하셨습니다.'); location.href='index.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <script>
    function login_check(event) {
        // 값 가져오기
        var id = document.getElementById("id");
        var pw = document.getElementById("pw");

        // 에러 메시지 초기화
        document.querySelector(".err_id").textContent = "";
        document.querySelector(".err_pw").textContent = "";

        // 입력 체크
        if (id.value.trim() === "") {
            document.querySelector(".err_id").textContent = "아이디를 입력하세요.";
            id.focus();
            return false; // 제출 중단
        }
        if (pw.value.trim() === "") {
            document.querySelector(".err_pw").textContent = "비밀번호를 입력하세요.";
            pw.focus();
            return false; // 제출 중단
        }

        // JS에서 submit 직접 호출하지 않고, 기본 제출 허용
        return true;
    }
    </script>
</head>
<body>
    <h1>Login</h1>
    <!-- onsubmit에서 login_check 반환값으로 제출 여부 결정 -->
    <form action="login_proc.php" method="post" id="login_form" onsubmit="return login_check(event)">
        <input type="text" name="id" id="id" placeholder="ID">
        <span class="err_id" style="color:red;"></span><br>

        <input type="password" name="pw" id="pw" placeholder="Password">
        <span class="err_pw" style="color:red;"></span><br>

        <input type="submit" value="로그인">
    </form>
      <button onclick="location.href='index.php'">메인화면</button>
</body>
</html>
