<?php
session_start();
$db = $_SESSION['db'];
if(!empty($_POST)){
include_once "../../conn/conn.php";
$id = $_POST['id'];
$sql_delet_missin_online = " DELETE FROM inbox WHERE id = $id ";
if ($conn->query($sql_delet_missin_online) === true) {
    echo "done";
} else {
    echo "not done";
}
} else {
   header('location:../views');
}
// $sql_del_postal_in_it = "DELETE n1 FROM misin_it_online n1, misin_it_online n2 WHERE n1.counter > n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.it_name = n2.it_name";
// if ($conn->query($sql_del_postal_in_it) === true) {
// }
