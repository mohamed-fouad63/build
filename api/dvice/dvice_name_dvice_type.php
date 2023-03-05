<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
if (!empty($_GET)) {
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $id_dvice_type = $_GET['id_dvice_type'];
        $query_all_in_it = "SELECT dvice_name_new FROM dvice_type WHERE id = '" . $id_dvice_type . "' ORDER BY dvice_name_new ASC";
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