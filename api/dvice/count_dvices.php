<?php
include("../../middleware/middleware_session.php");
// session_login_auth(!$_SESSION['all_dvices']);
if(!empty($_GET['id'])){
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
$id = $_GET['id'];
switch ($id) {
    case 'pc':
            $dvice_type = "الجهاز";
            $dvice_type2 = "";
        break;
    case 'monitor':
            $dvice_type = "الشاشه";
            $dvice_type2 = "";
        break;
    case 'printer':
            $dvice_type = "الطابعه";
            $dvice_type2 = "";
        break;
    case 'pos':
            $dvice_type = "ماكينه نقاط البيع";
            $dvice_type2 = "";
        break;
    case 'scanner':
            $dvice_type = "قارئ الباركود";
            $dvice_type2 = "قارىء باركود";
            $id = "postal";
        break;
    case 'barcode_printer':
            $dvice_type = "طابعه الباركود";
            $dvice_type2 = "طابعه باركود";
            $id = "postal";
        break;
    case 'weighter':
            $dvice_type = "الميزان الاليكترونى";
            $dvice_type2 = "ميزان الكتروني";
            $id = "postal";
        break;
    case 'displaying':
            $dvice_type = "شاشه العميل";
            $dvice_type2 = "شاشه عرض عملاء";
            $id = "postal";
        break;
    case 'paper_scanner':
            $dvice_type = "ماسح الضوئى العميل";
            $dvice_type2 = "ماسح ضوئي";
            $id = "other";
        break;
}
$get_ip = "";
$query_dvice_name=mysqli_query($conn, "select office_name,dvice_name,ip,sn,note,note_move_to from dvice where 
id = '$id' and dvice_type LIKE '%$dvice_type2%'");
$rowcount_dvice_name=mysqli_num_rows($query_dvice_name);

?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../../assets/css/count_dvice.css">
  <style>
      
    </style> 
        </head>
<body dir="rtl">
    <div class="middle">
        <div class="menu">
            <table class="">
                <tr class="">
                    <th>اسم المكتب</th>
                    <th>نوع <?php echo  $dvice_type ; ?></th>
                    <th>السريال</th>
                    <?php
                        if ($get_ip == 'yes') { echo "
                           <th>IP</th>
                            ";
                        }
                    ?>
                    
                    <th>موقفه</th>
                 </tr>
            <?php
                while($row=mysqli_fetch_assoc($query_dvice_name)){
                   $office_name = $row['office_name'];
                   $dvice_name = $row['dvice_name'];
                   $sn = $row['sn'];
                   $ip = $row['ip'];
                   $note = $row['note'].$row['note_move_to']; ?>
                    <tr>
                    <td><?php echo $office_name ; ?></td>
                    <td><?php echo $dvice_name ; ?></td>
                    <td><?php echo $sn ; ?></td>
                    <?php
                        if ($get_ip == 'yes') { echo "
                            <td>$ip</td>
                            ";
                        }
                    ?>
                    
                    <td><?php echo $note ; ?></td>
                    </tr>
    <?php } ?> 
            </table>
        </div>
    </div>
</body>
</html>
<?php } else {
      header('location:../../views');
} ?>