<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $dvice_id = $_POST['dvice_id'];
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_all_in_it = "SELECT dvice_name,COUNT(dvice_name) FROM dvice where id='$dvice_id'  GROUP BY dvice_name ORDER BY `dvice`.`dvice_name` ASC";
        $result = mysqli_query($conn, $query_all_in_it);
        $row_count = mysqli_num_rows($result);
        if ($row_count > 0) {
            while ($row_pc = mysqli_fetch_assoc($result)) {
                $row_read_dvice_json[] = $row_pc;
            }
            echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
        } else {
            $emptyresult = [];
            echo json_encode($emptyresult);
        }
    }
} else {
    header('location:../../views');
}
?>