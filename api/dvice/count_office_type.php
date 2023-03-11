<?php
session_start();
// $db = $_SESSION['db'];
if ($_SESSION['db'] && !empty($_POST)) {
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
    $office_type = [
        ['table' => 'building_names', 'office_type' => 'مبنى', 'col_name' => 'building_name'],
        ['table' => 'sectors', 'office_type' => 'قطاع', 'col_name' => 'sector_name'],
        ['table' => 'main_departments', 'office_type' => 'اداره عامه', 'col_name' => 'main_department_name'],
        ['table' => 'branch_departments', 'office_type' => 'اداره', 'col_name' => 'branch_department_name'],
        ['table' => 'sections', 'office_type' => 'قسم', 'col_name' => 'section_name']
    ];
    foreach ($office_type as $key => $val) {
        $col_name = $val['col_name'];
        $table = $val['table'];
        $office_type = $val['office_type'];
        $query_all_in_it = "select distinct $col_name from $table";
        $result = mysqli_query($conn, $query_all_in_it);
        $row_count = mysqli_num_rows($result);
        $row_read_dvice_json[$office_type] = $row_count;
    }
    echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
} else {
    header('location:../../views');
} ?>