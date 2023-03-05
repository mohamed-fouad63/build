<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
$user_id = $_POST['user_id'];
$user_auth = $_POST['user_auth'];
$auth_enable = $_POST['auth_enable'];
if (!empty($_POST)) {
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $sql_update = "UPDATE tbl_user SET $user_auth = '$auth_enable' where id = '$user_id' ";
        $conn->query($sql_update);
        echo $auth_enable;
    }
} else {
    header('location:../../views');
}
?>