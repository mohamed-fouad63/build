<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
// if (!empty($_POST)) {
if ($_SESSION['db']) {
    include_once "../../conn/conn.php";
    $result = mysqli_query($conn, "SELECT * FROM `tbl_user` where role <> 'admin'");
    $json_response = array();
    while ($row = mysqli_fetch_array($result)) {
        $floors = array();
        $user_id = $row['id'];
        $row_array = array();
        $row_array['id'] = $row['id'];
        $row_array['first_name'] = $row['first_name'];
        $row_array['build'] = $row['build'];
        $row_array['dvice_office'] = $row['dvice_office'];
        $row_array['add_dvice'] = $row['add_dvice'];
        $row_array['edit'] = $row['edit'];
        $row_array['all_dvices'] = $row['all_dvices'];
        $row_array['building'] = array();
        $option_qry = mysqli_query($conn, "SELECT * FROM `floors` WHERE id_it = '$user_id' GROUP BY building_name");
        while ($opt_fet = mysqli_fetch_array($option_qry)) {
            $building_name = $opt_fet['building_name'];
            $option_qry1 = mysqli_query($conn, "SELECT floor_id,floor_name,building_name FROM `floors` WHERE id_it = '$user_id' AND building_name = '$building_name' GROUP BY floor_name ");
            while ($opt_fet1 = mysqli_fetch_array($option_qry1)) {
                array_push($floors, $opt_fet1['floor_id']);
            }
            $row_array['building'][] =
                [
                    'building_name' => $opt_fet['building_name'],
                    "floor_name" => $floors
                ];
            $floors = array();
        }
        array_push($json_response, $row_array);
    }
    echo json_encode($json_response);
}
// } else {
//     header('location:../../views');
// }
?>