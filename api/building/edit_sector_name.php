<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $new_sector_name = filter_var($_POST['new_sector_name'], FILTER_SANITIZE_STRING);
    $old_sector_name = $_POST['old_sector_name'];
    $sector_id = $_POST['sector_id'];
    $floor_id = $_POST['floor_id'];
    $building_id = $_POST['building_id'];


    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_new_sector_name = mysqli_query($conn, "SELECT * FROM `sectors` where building_id = '$building_id' AND floor_id = '$floor_id' AND sector_name = '$new_sector_name' ");
        $rowcount_new_sector_name = mysqli_num_rows($query_new_sector_name);

        $query_all1 = "UPDATE all1 set office_name = 'مكتب رئيس $new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب رئيس $old_sector_name'";
        $query_branch_departments = "UPDATE branch_departments set sector_name = '$new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' ";
        $query_dvice = "UPDATE dvice set office_name = 'مكتب رئيس $new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب رئيس $old_sector_name' ";
        $query_main_departments = "UPDATE main_departments set sector_name = '$new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id'";
        $query_sections = "UPDATE sections set sector_name = '$new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id'";
        $query_sectors = "UPDATE sectors set sector_name = '$new_sector_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' ";

        if ($rowcount_new_sector_name == 0) {
            $result2 = $conn->prepare($query_all1);
            $result3 = $conn->prepare($query_branch_departments);
            $result4 = $conn->prepare($query_dvice);
            $result6 = $conn->prepare($query_main_departments);
            $result7 = $conn->prepare($query_sections);
            $result8 = $conn->prepare($query_sectors);
            $result2->execute();
            $result3->execute();
            $result4->execute();
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