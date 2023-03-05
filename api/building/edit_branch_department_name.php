<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {

    $new_branch_department_name = filter_var($_POST['new_branch_department_name'], FILTER_SANITIZE_STRING);
    $old_branch_department_name = $_POST['old_branch_department_name'];
    $branch_department_id = $_POST['branch_department_id'];
    $main_department_id = $_POST['main_department_id'];
    $sector_id = $_POST['sector_id'];
    $floor_id = $_POST['floor_id'];
    $building_id = $_POST['building_id'];

    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_branch_department_name = mysqli_query($conn, "SELECT * FROM `branch_departments` where building_id = '$building_id' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id' AND branch_department_name = '$new_branch_department_name'");

        $rowcount_query_branch_department_name = mysqli_num_rows($query_branch_department_name);

        $query_all1 = "UPDATE all1 set office_name = 'مكتب مدير $new_branch_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب مدير $old_branch_department_name'";
        $query_dvice = "UPDATE dvice set office_name = 'مكتب مدير $new_branch_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND  office_name = 'مكتب مدير $old_branch_department_name' ";
        $query_branch_departments = "UPDATE branch_departments set branch_department_name = '$new_branch_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id' AND branch_department_id = '$branch_department_id'";
        $query_sections = "UPDATE sections set branch_department_name = '$new_branch_department_name' WHERE building_id = '$building_id ' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id' AND branch_department_id = '$branch_department_id'";


        if ($rowcount_query_branch_department_name == 0) {
            $result2 = $conn->prepare($query_all1);
            $result3 = $conn->prepare($query_branch_departments);
            $result4 = $conn->prepare($query_dvice);
            $result7 = $conn->prepare($query_sections);
            $result2->execute();
            $result3->execute();
            $result4->execute();
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