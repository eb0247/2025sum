<?php
include "inc_head.php";
include "data.php";

// 세션 포트 랜덤 설정 (한 번만)
if (!isset($_SESSION['local_port'])) {
    $_SESSION['local_port'] = rand(1500, 1800);
}
$local_port = $_SESSION['local_port'];

// Python 서버 실행 (한 번만)
if (!isset($_SESSION['server_started'])) {
    $python_script = "C:\\xampp\\htdocs\\25sum\\server.py";
    $cmd = "python \"$python_script\" $local_port";
    pclose(popen("start /B " . $cmd, "r"));

    $_SESSION['server_started'] = true;
}

// 서버가 뜰 시간을 잠시 대기
usleep(500000); // 0.5초

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $url = $_POST['url'] ?? "";

    $parsed = @parse_url($url);
    $host = strtolower($parsed['host'] ?? '');
    $port = isset($parsed['port']) ? intval($parsed['port']) : 80;

    $allowed_hosts = ["127.0.0.1", "localhost", "::1"];
    if (in_array($host, $allowed_hosts, true) && $port === $local_port) {
        echo "<script>alert('성공');window.location.href='/25sum/end.php';</script>";
        exit;
    } else {
        echo "<script>alert('실패');window.location.href='/25sum/index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('잘못된 요청');window.location.href='/25sum/index.php';</script>";
    exit;
}
?>
