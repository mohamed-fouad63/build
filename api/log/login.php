<?php

// if(!$_SESSION){
//     header('location:/it2/views/login.php');
// }
session_start();
if(!empty($_POST)){
    $user_pass = $_POST['user_pass'];
    $user_id = $_POST['user_id'];

    include "../../conn/conn_log.php";
    
    $login_query = mysqli_query($conn, "SELECT *  FROM tbl_user WHERE id = '$user_id' ");
    $row_count = mysqli_num_rows($login_query);
    if($row_count == 0){
        echo "المستخدم غير مسجل على هذه المنطقه";
        return false;
    }
    while ($row = mysqli_fetch_assoc($login_query)) {
        if ($user_pass == $row["password"]) {
            
            $_SESSION['db'] = $row["db"];
            $_SESSION['user_name'] =  $row["first_name"];
            // $_SESSION['user_name'] = implode(' ', array_slice(explode(' ', $row["first_name"]), 0, 4));
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['job'] = $row['job'];
            $_SESSION['post'] = $row['post'];
            $_SESSION['add_dvice'] = $row['add_dvice'];
            $_SESSION['edit'] = $row['edit'];
            $_SESSION['move'] = $row['move'];
            $_SESSION['to_it'] = $row['to_it'];
            $_SESSION['resent'] = $row['resent'];
            $_SESSION['in_it'] = $row['in_it'];
            $_SESSION['edit_in_it'] = $row['edit_in_it'];
            $_SESSION['move_in_it'] = $row['move_in_it'];
            $_SESSION['to_tts'] = $row['to_tts'];
            $_SESSION['resent_in_it'] = $row['resent_in_it'];
            $_SESSION['delete_in_it'] = $row['delete_in_it'];
            $_SESSION['in_tts'] = $row['in_tts'];
            $_SESSION['edit_in_tts'] = $row['edit_in_tts'];
            $_SESSION['resent_in_tts'] = $row['resent_in_tts'];
            $_SESSION['replace_dvices'] = $row['replace_dvices'];
            $_SESSION['retweet'] = $row['retweet'];
            $_SESSION['replace_sims_in_it'] = $row['replace_sims_in_it'];
            $_SESSION['all_dvices'] = $row['all_dvices'];
            $_SESSION['Incoming'] = $row['Incoming'];
            $_SESSION['move_dvices'] = $row['move_dvices'];
            $_SESSION['deleted_dvices'] = $row['deleted_dvices'];
            $_SESSION['all_misin'] = $row['all_misin'];
            $_SESSION['notice'] = $row['notice'];
            $_SESSION['link_office_group'] = $row['link_office_group'];
            $_SESSION['edit_office'] = $row['edit_office'];
            $_SESSION['add_office'] = $row['add_office'];
            $_SESSION['office_group'] = $row['office_group'];
            $_SESSION['my_misin'] = $row['my_misin'];
            $_SESSION['misins'] = $row['misins'];
            $_SESSION['edit_misin'] = $row['edit_misin'];
            $_SESSION['misin_pos'] = $row['misin_pos'];
            $_SESSION['postal'] = $row['postal'];
            $_SESSION['hewalat'] = $row['hewalat'];
            $_SESSION['users'] = $row['users'];
            $_SESSION['reg_to'] = $row['reg_to'];
            $_SESSION['to_filter'] = $row['to_filter'];
            $_SESSION['reg_to_edit'] = $row['reg_to_edit'];
            $_SESSION['reg_in'] = $row['reg_in'];
            $_SESSION['in_filter'] = $row['in_filter'];
            $_SESSION['reg_parcel_to'] = $row['reg_parcel_to'];
            $_SESSION['parcel_to_filter'] = $row['parcel_to_filter'];
            $_SESSION['reg_parcel_to_edit'] = $row['reg_parcel_to_edit'];
            $_SESSION['link_record'] = $row['link_record'];
            $_SESSION['link_dvice'] = $row['link_dvice'];
            $_SESSION['link_misin'] = $row['link_misin'];
            $_SESSION['link_user'] = $row['link_user'];
            $_SESSION['link_reg'] = $row['link_reg'];
            $_SESSION['link_network'] = $row['link_network'];
            $_SESSION['sims'] = $row['sims'];
            $_SESSION['replace_sims'] = $row['replace_sims'];
            $_SESSION['link_count_wrong'] = $row['link_count_wrong'];
            $_SESSION['counts'] = $row['counts'];
            $_SESSION['wrong'] = $row['wrong'];
            echo "done";

        } else {
            echo "خطأ فى اسم المستخدم او كلمه المرور";
        }
    }
    } else {
  header('location:/it2/views/login.php');
}
