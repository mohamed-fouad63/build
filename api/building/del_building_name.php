<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_name = $_POST['building_name'];
    $building_id = $_POST['building_id'];
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_all1 = mysqli_query($conn, "SELECT building_name FROM all1  where building_id = '$building_id'");
        $rowcount_query_all1 = mysqli_num_rows($query_all1);

        $query_branch_departments = mysqli_query($conn, "SELECT building_name FROM branch_departments  where building_id = '$building_id'");
        $rowcount_query_branch_departments = mysqli_num_rows($query_branch_departments);

        $query_dvice = mysqli_query($conn, "SELECT building_name FROM dvice  where building_id = '$building_id'");
        $rowcount_query_dvice = mysqli_num_rows($query_dvice);

        $query_floors = mysqli_query($conn, "SELECT building_name FROM floors  where building_id = '$building_id'");
        $rowcount_query_floors = mysqli_num_rows($query_floors);

        $query_main_departments = mysqli_query($conn, "SELECT building_name FROM main_departments  where building_id = '$building_id'");
        $rowcount_query_main_departments = mysqli_num_rows($query_main_departments);

        $query_sections = mysqli_query($conn, "SELECT building_name FROM sections  where building_id = '$building_id'");
        $rowcount_query_sections = mysqli_num_rows($query_sections);

        $query_sectors = mysqli_query($conn, "SELECT building_name FROM sectors  where building_id = '$building_id'");
        $rowcount_query_sectors = mysqli_num_rows($query_sectors);

        if (
            $rowcount_query_dvice > '0' ||
            $rowcount_query_all1 > '0' ||
            $rowcount_query_sections > '0' ||
            $rowcount_query_branch_departments > '0' ||
            $rowcount_query_main_departments > '0' ||
            $rowcount_query_sectors > '0' ||
            $rowcount_query_floors > '0'
        ) {
            echo "not delete";
        } else {

            $sql_delete = "DELETE FROM `building_names` WHERE building_id = '$building_id'";
            $result2 = $conn->prepare($sql_delete);
            $result2->execute();
            echo "done";
        }
    } else {
        echo 'not done';
    }

} else {
    header('location:../../views');
}
?>