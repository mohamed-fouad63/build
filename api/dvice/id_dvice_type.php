<?php
session_start();
if ($_SESSION['add_dvice'] && !empty($_POST)) {
  $db = $_SESSION['db'];
  include_once "../../conn/conn.php";
  $query_all_in_it = "SELECT id FROM dvice_type GROUP BY id HAVING COUNT(*) >= 1 ";
  $result = mysqli_query($conn, $query_all_in_it);
  while ($row_pc = mysqli_fetch_assoc($result)) {
    $row_read_dvice_json[] = $row_pc;
  }
  echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
} else {
  header('location:../../views');
}
?>