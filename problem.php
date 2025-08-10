<?php
session_start();


if (!isset($_SESSION['local_port'])) {
    $_SESSION['local_port'] = rand(1500, 1800);
}
$local_port = $_SESSION['local_port'];

// 나머지 코드는 동일


$flag = "[**FLAG**]";
if (file_exists("./flag.txt")) {
    $flag = file_get_contents("./flag.txt");
}


//http://localhost:8000/ 이런 거 직접 입력
if ($_SERVER['REQUEST_URI'] === "/") {
    echo "<script>alert('실패3');window.location.href = 'http://localhost/2025여름해캠/index.php';</script>";
    exit;
}



    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        echo "<script>alert('실패4');window.location.href = 'http://localhost/2025여름해캠/index.php';</script>";
        exit;

    } elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
        $url = $_POST['url'] ?? "";
        $urlp = parse_url($url);

        if (isset($url[0]) && $url[0] === "/") {
            $url = "http://localhost:80" . $url;
        }
        elseif (isset($urlp['host']) &&
               (strpos($urlp['host'], "localhost") !== false || strpos($urlp['host'], "127.0.0.1") !== false)) {
            if (isset($urlp['port']) && intval($urlp['port']) === $local_port) {

                echo "<script>alert('성공');window.location.href = 'http://localhost/2025여름해캠/index.php';</script>";
                exit;
                // $img = base64_encode($data);
                // include "img_viewer.html";

            } else {

                echo "<script>alert('실패1');window.location.href = 'http://localhost/2025여름해캠/index.php';</script>";
                exit;

            }
        }
        else {
            // localhost 아닌 URL 처리
            $data = @file_get_contents($url);

            echo "<script>alert('실패2');window.location.href = 'http://localhost/2025여름해캠/index.php';</script>";
            exit;
        }
    }

?>
