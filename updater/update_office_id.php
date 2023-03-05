<?php
session_start();
$db = $_SESSION['db'];
include_once "../conn/conn.php";
$offide_id = 'ALTER TABLE `dvice` ADD `office_id` INT NOT NULL AFTER `id`;';
$result1 = $conn->prepare($offide_id);
$result1->execute();

$update_office_id = '
UPDATE dvice
INNER JOIN all1
ON all1.office_name = dvice.office_name
SET dvice.office_id =  all1.id
WHERE 
all1.building_id = dvice.building_id
AND all1.floor_id = dvice.floor_id
';
$result2 = $conn->prepare($update_office_id);
$result2->execute();
?>