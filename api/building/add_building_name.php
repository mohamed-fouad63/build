<?php
session_start();
$db = $_SESSION['db'];
if (!empty($_POST)) {
    $building_name = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
    ;
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $query_office_name = mysqli_query($conn, "SELECT building_name FROM `building_names` where building_name = '$building_name'");
        $rowcount_office_name = mysqli_num_rows($query_office_name);
        $query_all1 = "INSERT INTO building_names (building_name) VALUES ('$building_name')";
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