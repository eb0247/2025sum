<?php
include "inc_head.php";

// hidden_memo 출력 여부 초기화
$_SESSION['show_hidden'] = false;

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['memo'])) {
    $memo = trim($_POST['memo']);

    if (stripos($memo, '<script>') !== false) {
        // XSS 입력이면 hidden_memo 출력 플래그 설정
        $_SESSION['show_hidden'] = true;
    } else {
        // 일반 메모는 배열에 누적
        if ($memo !== '') {
            $_SESSION['memos'][] = $memo;
        }
    }
}

// memo.php로 리다이렉트
header("Location: memo.php");
exit;
