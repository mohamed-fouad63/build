<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_all_in_it = "SELECT * FROM `building_names`";
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