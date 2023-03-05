<?php
session_start();
$db = $_SESSION['db'];
$old_pass = $_POST['old_pass'];
$new_pass = filter_var($_POST['new_pass'], FILTER_SANITIZE_STRING);
$re_new_pass = filter_var($_POST['re_new_pass'], FILTER_SANITIZE_STRING);
$user_id = $_SESSION['id'];
if (!empty($new_pass) && !empty($re_new_pass) && !empty($old_pass)) {
    if ($new_pass != $re_new_pass) {
        echo "كلمتان المرور غير متطابقان حاول مر اخرى";
    } else {
        include_once "../../conn/conn.php";
        $query = "SELECT * FROM tbl_user WHERE id = '$user_id'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            if ($row['password'] != $old_pass) {
                echo "كلمه المرور القديمه غير صحيحه";
            } else {
                $sql_update = "UPDATE tbl_user SET password = '$new_pass' WHERE id ='$user_id'";
                $conn->query($sql_update);
                echo "تم تغيير كلمه المرور بنجاح";
            }
        }
    }
} else {
    echo "كلمه المرور فارغه";
}
?>