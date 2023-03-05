<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {

    $section_name = $_POST['section_name'];
    $section_id = $_POST['section_id'];
    $branch_department_id = $_POST['branch_department_id'];
    $main_department_id = $_POST['main_department_id'];
    $sector_id = $_POST['sector_id'];
    $floor_id = $_POST['floor_id'];
    $building_id = $_POST['building_id'];

    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";

        $query_dvice = mysqli_query($conn, "SELECT office_name FROM dvice where building_id = '$building_id' AND floor_id = '$floor_id' AND office_name = '$section_name'");
        $rowcount_query_dvice = mysqli_num_rows($query_dvice);

        if ($rowcount_query_dvice > '0') {
            echo "not delete";
        } else {
            $sql_delete = "DELETE FROM `sections` WHERE building_id = '$building_id' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id' AND branch_department_id = '$branch_department_id' AND section_id = '$section_id ' AND section_name = '$section_name'";
            $result = $conn->prepare($sql_delete);
            $result->execute();
            $sql_delete2 = "DELETE FROM `all1` WHERE building_id = '$building_id' AND floor_id = '$floor_id' AND office_name = '$section_name' ";
            $result2 = $conn->prepare($sql_delete2);
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