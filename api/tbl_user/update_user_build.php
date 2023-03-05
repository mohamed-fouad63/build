<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$building_id_select = $_POST['building_id_select'];
$floor_id_select = $_POST['floor_id_select'];
if (!empty($_POST)) {
  if ($_SESSION['db']) {
    include_once "../../conn/conn.php";
    if ($floor_id_select[0] == 'clear_floors') {
      $clear_floors = " UPDATE floors set id_it = '' WHERE id_it = '$user_id' AND building_id = '$building_id_select' ";
      $conn->query($clear_floors);
    } else {
      $clear_floors = " UPDATE floors set id_it = '' WHERE id_it = '$user_id' AND building_id = '$building_id_select' ";
      $conn->query($clear_floors);
      foreach ($floor_id_select as $k => $v) {
        $sql_update = "UPDATE floors SET id_it = $user_id where floor_id  = $v AND building_id = '$building_id_select' ";
        $conn->query($sql_update);
      }
    }
    echo 'done';
  }
} else {
  header('location:../../views');
}
?>