<?php
// 세션 설정 (가장 먼저)
ini_set('session.cookie_lifetime', 0);
ini_set('session.cookie_secure', 0);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);

session_start();
?>
