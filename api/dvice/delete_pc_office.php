<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
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