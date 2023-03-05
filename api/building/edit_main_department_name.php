<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {

    $new_main_department_name = filter_var($_POST['new_main_department_name'], FILTER_SANITIZE_STRING);
    $old_main_department_name = $_POST['old_main_department_name'];
    $main_department_id = $_POST['main_department_id'];
    $sector_id = $_POST['sector_id'];
    $floor_id = $_POST['floor_id'];
    $building_id = $_POST['building_id'];

    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_floor_name = mysqli_query($conn, "SELECT * FROM `main_departments` where building_id = '$building_id' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_name = '$new_main_department_name'");
        $rowcount_query_floor_name = mysqli_num_rows($query_floor_name);

        $query_all1 = "UPDATE all1 set office_name = 'مكتب مدير $new_main_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب مدير $old_main_department_name'";
        $query_dvice = "UPDATE dvice set office_name = 'مكتب مدير $new_main_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب مدير $old_main_department_name' ";
        $query_main_departments = "UPDATE main_departments set main_department_name = '$new_main_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id'";
        $query_branch_departments = "UPDATE branch_departments set main_department_name = '$new_main_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id'";
        $query_sections = "UPDATE sections set main_department_name = '$new_main_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id'";

        if ($rowcount_query_floor_name == 0) {
            $result2 = $conn->prepare($query_all1);
            $result3 = $conn->prepare($query_branch_departments);
            $result4 = $conn->prepare($query_dvice);
            $result6 = $conn->prepare($query_main_departments);
            $result7 = $conn->prepare($query_sections);
            $result2->execute();
            $result3->execute();
            $result4->execute();
            $result6->execute();
            $result7->execute();
            echo 'done';
        } else {
            echo 'not done';
        }
    }
} else {
    header('location:../../views');
}
?>