<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_id = $_POST['building_id'];
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_all_in_it = '
        SELECT building_names.building_name,building_names.building_id,
        COUNT(CASE WHEN floors.building_id = ' . $building_id . ' THEN 1 ELSE NULL END) AS count_floor
        FROM building_names
        INNER JOIN floors
        ON building_names.building_id = floors.building_id
';
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