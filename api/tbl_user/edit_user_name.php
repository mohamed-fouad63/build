<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
$edit_user_name = filter_var($_POST['edit_user_name'], FILTER_SANITIZE_STRING);
$edit_user_id = filter_var($_POST['edit_user_id'], FILTER_SANITIZE_STRING);
$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);

if (!empty($_POST)) {
    if (filter_var($edit_user_id, FILTER_VALIDATE_INT) !== false) {
        if ($_SESSION['db']) {
            include_once "../../conn/conn.php";
            $sql_update = "UPDATE tbl_user SET first_name = '$edit_user_name' , id = '$edit_user_id' where id = '$user_id' ";
            $sql_user_floors = "UPDATE floors set id_it = '$edit_user_id' WHERE id_it = '$user_id' ";
            $conn->query($sql_update);
            $conn->query($sql_user_floors);
            echo 'done';
        }
    } else {
        echo 'رقم ملف غير صالح';
    }

} else {
    header('location:../../views');
}
?>