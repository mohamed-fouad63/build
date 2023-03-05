<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $new_floor_name = filter_var($_POST['new_floor_name'], FILTER_SANITIZE_STRING);
    $new_floor_id = $_POST['new_floor_id'];

    $old_floor_id = $_POST['old_floor_id'];
    $old_floor_name = $_POST['old_floor_name'];

    $floor_index_id = $_POST['floor_index_id'];
    $building_id = $_POST['building_id'];


    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_floor_id = mysqli_query($conn, "SELECT * FROM `floors` where building_id = '$building_id' AND floor_id = '$new_floor_id'");
        $query_floor_name = mysqli_query($conn, "SELECT * FROM `floors` where building_id = '$building_id' AND floor_name = '$new_floor_name'");

        $rowcount_floor_id = mysqli_num_rows($query_floor_id);
        $rowcount_floor_name = mysqli_num_rows($query_floor_name);

        $query_all1 = "UPDATE all1 set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id' ";
        $query_branch_departments = "UPDATE branch_departments set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id' ";
        $query_dvice = "UPDATE dvice set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id' ";
        $query_floors = "UPDATE floors set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id'";
        $query_main_departments = "UPDATE main_departments set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id'";
        $query_sections = "UPDATE sections set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id'";
        $query_sectors = "UPDATE sectors set floor_name = '$new_floor_name',floor_id = '$new_floor_id' WHERE building_id = '$building_id ' AND floor_name = '$old_floor_name' AND floor_id = '$old_floor_id'";

        if ($_POST['new_floor_id'] == $_POST['old_floor_id']) {
            $rowcount_floor_id = 0;
        }

        if ($rowcount_floor_id == 0) {
            $result2 = $conn->prepare($query_all1);
            $result3 = $conn->prepare($query_branch_departments);
            $result4 = $conn->prepare($query_dvice);
            $result5 = $conn->prepare($query_floors);
            $result6 = $conn->prepare($query_main_departments);
            $result7 = $conn->prepare($query_sections);
            $result8 = $conn->prepare($query_sectors);
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