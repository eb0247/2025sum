<?php
session_start();
include "inc_head.php";
include "data.php";

// POST 요청 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['memo'])) {
    $memo = trim($_POST['memo']);
    if ($memo !== '') {
        // <script> 포함 여부 체크
        if (stripos($memo, '<script>') !== false) {
            $_SESSION['show_hidden'] = true; // 숨겨진 메모 출력
        } else {
            if (!isset($_SESSION['memos'])) {
                $_SESSION['memos'] = [];
            }
            $_SESSION['memos'][] = $memo;   // 일반 메모 누적
        }
    }
}

// memo.php로 리다이렉트
header("Location: memo.php");
exit;
