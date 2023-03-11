<?php
session_start();
if ($_SESSION['db'] && !empty($_POST)) {
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
    $result = mysqli_query($conn, "SELECT * FROM `building_names` GROUP by building_name");
    $json_response = array();
    while ($row = mysqli_fetch_array($result)) {
        $floors = array();
        $building_name = $row['building_name'];
        $building_id = $row['building_id'];
        $row_array = array();
        $row_array['building_name'] = $row['building_name'];
        $row_array['building_id'] = $row['building_id'];
        $row_array['monitor'] = array();
        $row_array['pc'] = array();
        $row_array['printer'] = array();
        $row_array['other'] = array();
        $row_array['postal'] = array();
        $option_qry = mysqli_query($conn, "SELECT id,COUNT(id) FROM `dvice` WHERE building_id = '$building_id' GROUP by id;");
        while ($opt_fet = mysqli_fetch_array($option_qry)) {
            $row_array[$opt_fet['id']] = $opt_fet['COUNT(id)'];
        }
        array_push($json_response, $row_array);
    }
    echo json_encode($json_response);
} else {
    header('location:../../views');
}
?>