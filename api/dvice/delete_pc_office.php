<?php
session_start();
if ($_SESSION['db'] && !empty($_POST)) {
  $db = $_SESSION['db'];
  $dvice_num = $_POST['dvice_num'];
  if (!empty($dvice_num)) {
    if ($_SESSION['db']) {
      include_once "../../conn/conn.php";
      $sql_update = "
        DELETE FROM `dvice`
        where num = $dvice_num
      ";
      $conn->query($sql_update);
      echo "done";
    } else {
      echo "not done";
    }
  }
} else {
  header('location:../../views');
}
?>