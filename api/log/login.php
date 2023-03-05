<?php
session_start();
if (!empty($_POST)) {
    $user_pass = $_POST['user_pass'];
    $user_id = $_POST['user_id'];
    include "../../conn/conn_log.php";
    $login_query = mysqli_query($conn, "SELECT *  FROM tbl_user WHERE id = '$user_id' ");
    $row_count = mysqli_num_rows($login_query);
    if ($row_count == 0) {
        echo "المستخدم غير مسجل";
        return false;
    }
    while ($row = mysqli_fetch_assoc($login_query)) {
        if ($user_pass == $row["password"]) {
            $_SESSION['user_name'] = $row["first_name"];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['build'] = $row['build'];
            $_SESSION['dvice_office'] = $row['dvice_office'];
            $_SESSION['edit'] = $row['edit'];
            $_SESSION['add_dvice'] = $row['add_dvice'];
            $_SESSION['users'] = $row['users'];
            $_SESSION['all_dvices'] = $row['all_dvices'];
            $_SESSION['db'] = $row['db'];
            echo "done";
        } else {
            echo "خطأ فى اسم المستخدم او كلمه المرور";
        }
    }
} else {
    header('location:/build/views/login.php');
}
?>