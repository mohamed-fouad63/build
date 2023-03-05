<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
  if ($_SESSION['db']) {
    include_once "../../conn/conn.php";
    $id = $_POST['user_id'];
    $sql_update = "UPDATE tbl_user SET password = $id where id  = $id ";
    $conn->query($sql_update);
    echo 'done';
  }
} else {
  header('location:../../views');
}
?>