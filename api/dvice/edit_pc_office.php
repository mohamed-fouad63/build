<?php
session_start();
// $db = $_SESSION['db'];
$db = 'buildings';
if (!empty($_POST)) {
  if ($_SESSION['db']) {
    include_once "../../conn/conn.php";
    $pc_sn = filter_var($_POST['pc_sn'], FILTER_SANITIZE_STRING);
    $pc_ip = filter_var($_POST['pc_ip'], FILTER_SANITIZE_STRING);
    $pc_domian_name = filter_var($_POST['pc_domian_name'], FILTER_SANITIZE_STRING);
    $dvice_num = $_POST['dvice_num'];

    $sql_count_sn = "SELECT sn FROM dvice WHERE sn = '$pc_sn' ";
    $result1 = mysqli_query($conn, $sql_count_sn);
    $row_count = mysqli_num_rows($result1);
    if (!empty($dvice_num)) {
      if ($row_count == '0') {
        $sql_update = "UPDATE dvice SET sn = '$pc_sn', ip ='$pc_ip', pc_doman_name ='$pc_domian_name' where num = '$dvice_num' ";
        $result = $conn->query($sql_update);
        echo "done";
      } else {
        echo "سريال مكرر";
      }
    } else {
      echo "لم يتم التعديل";
    }
  }
} else {
  header('location:../../views');
}