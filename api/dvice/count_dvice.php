<?php
include("../../middleware/middleware_session.php");
// session_login_auth(!$_SESSION['all_dvices']);
if (!empty($_GET['dvice_name']) && !empty($_GET['dvice_type']) && !empty($_GET['ip'])) {
    $db = $_SESSION['db'];
    include_once "../../conn/conn.php";
    $dvice_name = $_GET['dvice_name'];
    $dvice_type = $_GET['dvice_type'];
    $get_ip = $_GET['ip'];
    $query_dvice_name = mysqli_query($conn, "select office_name,dvice_name,ip,sn,note,note_move_to from dvice where 
dvice_name = '$dvice_name'");
    $rowcount_dvice_name = mysqli_num_rows($query_dvice_name);

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
                        <th>نوع
                            <?php echo $dvice_type; ?>
                        </th>
                        <th>السريال</th>
                        <?php
                        if ($get_ip == 'yes') {
                            echo "
                            <th>IP</th>
                            ";
                        }
                        ?>

                        <th>موقفه</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($query_dvice_name)) {
                        $office_name = $row['office_name'];
                        $dvice_name = $row['dvice_name'];
                        $sn = $row['sn'];
                        $ip = $row['ip'];
                        $note = $row['note'] . $row['note_move_to']; ?>
                        <tr>
                            <td>
                                <?php echo $office_name; ?>
                            </td>
                            <td>
                                <?php echo $dvice_name; ?>
                            </td>
                            <td>
                                <?php echo $sn; ?>
                            </td>
                            <?php
                            if ($get_ip == 'yes') {
                                echo "
                            <td>$ip</td>
                            ";
                            }
                            ?>
                            <td>
                                <?php echo $note; ?>
                            </td>
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