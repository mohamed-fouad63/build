<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_id = $_POST['building_id'];
    $building_name = $_POST['building_name'];
    $floor_id = $_POST['floor_id'];
    $floor_name = filter_var($_POST['floor_name'], FILTER_SANITIZE_STRING);
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_office_name = mysqli_query($conn, "SELECT * FROM `floors` where building_id = '$building_id' AND floor_id = '$floor_id'");
        $rowcount_office_name = mysqli_num_rows($query_office_name);
        $query_all1 = "INSERT INTO `floors`(`building_id`, `building_name`, `floor_id`, `floor_name`)
                                    VALUES ('$building_id','$building_name','$floor_id ','$floor_name')";
        if ($rowcount_office_name == 0) {
            $result2 = $conn->prepare($query_all1);
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