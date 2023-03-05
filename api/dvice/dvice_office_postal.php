<?php
session_start();
// $db = $_SESSION['db'];
$db = $_SESSION['db'];
if (!empty($_POST)) {
    if ($_SESSION['db']) {
        include_once "../../conn/conn.php";
        $input_search = $_POST['input_search'];
        $query_all_in_it = "SELECT num,id,office_name,dvice_type,dvice_name,sn,note,note_move_to FROM dvice WHERE office_id = '" . $input_search . "' and id = 'postal' ";
        $result = mysqli_query($conn, $query_all_in_it);
        $row_count = mysqli_num_rows($result);
        if ($row_count > 0) {
            while ($row_pc = mysqli_fetch_assoc($result)) {

                $row_read_dvice_json[] = $row_pc;
            }
            echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('message' => 'no datas found'));
        }
    } else {
        header('location:../../views');
    }
} else {
    header('location:../../views');
}
?>