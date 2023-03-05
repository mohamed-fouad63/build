<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_id = $_POST['building_id'];
    $building_name = $_POST['building_name'];
    $floor_id = $_POST['floor_id'];
    $floor_name = $_POST['floor_name'];
    $sector_id = $_POST['sector_id'];
    $sector_name = $_POST['sector_name'];
    $main_department_id = $_POST['main_department_id'];
    $main_department_name = $_POST['main_department_name'];
    $branch_department_name = $_POST['branch_department_name'];
    $branch_department_id = $_POST['branch_department_id'];
    $section_name = filter_var($_POST['department_section_name'], FILTER_SANITIZE_STRING);
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_office_name = mysqli_query($conn, "SELECT * FROM `sections` where building_id = '$building_id' AND floor_id = '$floor_id' AND sector_id = '$sector_id' AND main_department_id = '$main_department_id' AND branch_department_id = '$branch_department_id' AND section_name = '$section_name' ");
        $rowcount_office_name = mysqli_num_rows($query_office_name);
        $query_insert_section = "INSERT INTO `sections`(`building_id`, `building_name`, `floor_id`, `floor_name`,`sector_id`,`sector_name`,`main_department_name`,`main_department_id`,`branch_department_name`,`branch_department_id`,`section_name`)
            VALUES ('$building_id','$building_name','$floor_id ','$floor_name','$sector_id','$sector_name','$main_department_name','$main_department_id','$branch_department_name','$branch_department_id','$section_name')";

        $query_insert_all1 = "INSERT INTO `all1`
            (`office_name`,`building_id`, `building_name`, `floor_id`, `floor_name`)
            VALUES ('$section_name','$building_id','$building_name','$floor_id ','$floor_name')";
        if ($rowcount_office_name == 0) {
            $result1 = $conn->prepare($query_insert_section);
            $result1->execute();
            $result2 = $conn->prepare($query_insert_all1);
            $result2->execute();
            echo 'done';
        } else {
            echo 'not done';
        }
    }
} else {
    header('location:../../views');
}
?>