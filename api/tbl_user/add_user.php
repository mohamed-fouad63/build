<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);
    $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $job = $_POST['job'];
    if (filter_var($user_id, FILTER_VALIDATE_INT) !== false) {
        if ($_SESSION['db']) {
            include_once "../../conn/conn.php";
            $query_user_id = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE id = '$user_id' ");
            $rowcount_user = mysqli_num_rows($query_user_id);
            $sql_insert = "INSERT INTO `tbl_user`(`id`, `password`, `first_name`, `job`) VALUES ('$user_id','$user_id','$user_name','$job')";
            if (!empty($user_id) || !empty($user_name) || !empty($job)) {
                if ($rowcount_user == 0) {
                    $conn->query($sql_insert);
                    echo "done";
                } else {
                    echo "رقم ملف مكرر";
                }
            }
        }
    } else {
        echo 'رقم ملف غير صالح';
    }
} else {
    header('location:../../views');
}
?>