<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
   $post_group = $_POST['post_group'];
   $groupkey1 = $_POST['groupkey1'];
   $groupkey2 = $_POST['groupkey2'];
   $money_code = $_POST['money_code'];
   $post_code = $_POST['post_code'];
   $postal_code = $_POST['postal_code'];
   $office_type = $_POST['office_type'];
   $tel = $_POST['tel'];
   $address = $_POST['address'];
   $office_id = $_POST['office_id'];
   if ($_SESSION['db']) {
      include_once "../../conn/conn.php";
      $query_all_in_it = "UPDATE  all1 SET 
         post_group = '$post_group',
         office_type = '$office_type',
         money_code = '$money_code',
         post_code = '$post_code',
         postal_code = '$postal_code',
         tel = '$tel',
         address = '$address'
         WHERE id = '$office_id' ";
      $result2 = $conn->prepare($query_all_in_it);
      $result2->execute();
      echo 'done';
   }
} else {
   header('location:../../views');
}
?>