<?php
session_start();
$db = $_SESSION['db'];
if(!empty($_GET)){
$input_search = $_GET['phrase'];
if(!empty($input_search)){
    $input_search = $_GET['phrase'];
}
else {
    $input_search = '';
}
    if($_SESSION['db']){
    include_once "../../conn/conn.php";
$query_all_in_it = 'SELECT * FROM all1 WHERE office_name LIKE "%'.$input_search.'%" OR postal_code LIKE "%'.$input_search.'%" OR money_code LIKE "%'.$input_search.'%" OR post_code LIKE "%'.$input_search.'%" ORDER BY office_name ASC';
$result = mysqli_query($conn, $query_all_in_it);

while($row_pc=mysqli_fetch_assoc($result)){

        $row_read_dvice_json[] = $row_pc;
    }
    echo json_encode($row_read_dvice_json,JSON_UNESCAPED_UNICODE);
}
} else {
     header('location:../views');
}
?>