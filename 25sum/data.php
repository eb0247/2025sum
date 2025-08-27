<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = '25SUM';

$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$db_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$random_pass = bin2hex(random_bytes(16));

$sql_update = "UPDATE users
               SET password = '$random_pass'
               WHERE id = 'egg_bread'";
mysqli_query($db_conn, $sql_update);

// 없으면 INSERT
if (mysqli_affected_rows($db_conn) == 0) {
    $sql_insert = "INSERT INTO users (id, password)
                   VALUES ('egg_bread', '$random_pass')";
    mysqli_query($db_conn, $sql_insert);
}

?>
