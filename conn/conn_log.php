<?php
// if(!empty($_POST['db'])){
// $db = $_POST['db']; 
$db = 'buildings';
mysqli_report(MYSQLI_REPORT_OFF); //Turn off default messages
$conn = @mysqli_connect($host, 'root', "12345678", "$db") or die("لا يوجد قاعده بيانات لهذه المنطقه");
// }
?>