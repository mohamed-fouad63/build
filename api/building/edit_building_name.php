<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_name = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
    $building_id = $_POST['building_id'];
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_office_name = mysqli_query($conn, "SELECT building_name FROM `building_names` where building_name = '$building_name' AND building_id = '$building_id'");
        $rowcount_office_name = mysqli_num_rows($query_office_name);
        $building_names = "UPDATE building_names set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_all1 = "UPDATE all1 set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_branch_departments = "UPDATE branch_departments set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_dvice = "UPDATE dvice set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_floors = "UPDATE floors set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_main_departments = "UPDATE main_departments set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_sections = "UPDATE sections set building_name = '$building_name' WHERE building_id = '$building_id '";
        $query_sectors = "UPDATE sectors set building_name = '$building_name' WHERE building_id = '$building_id '";
        if ($rowcount_office_name == 0) {
            $result1 = $conn->prepare($building_names);
            $result2 = $conn->prepare($query_all1);
            $result3 = $conn->prepare($query_branch_departments);
            $result4 = $conn->prepare($query_dvice);
            $result5 = $conn->prepare($query_floors);
            $result6 = $conn->prepare($query_main_departments);
            $result7 = $conn->prepare($query_sections);
            $result8 = $conn->prepare($query_sectors);
            $result1->execute();
            $result2->execute();
            $result3->execute();
            $result4->execute();
            $result5->execute();
            $result6->execute();
            $result7->execute();
            $result8->execute();
            echo 'done';
        } else {
            echo 'not done';
        }
    }
} else {
    header('location:../../views');
}
?>