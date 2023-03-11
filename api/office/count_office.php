<?php
session_start();
if (!empty($_GET['office_type']) && $_SESSION['db']) {
    $db = $_SESSION['db'];
    $office_type = $_GET['office_type'];
    switch ($office_type) {
        case 'مبنى':
            $table = 'building_names';
            $col_name = 'building_name';
            break;
        case 'قطاع':
            $table = 'sectors';
            $col_name = 'sector_name';
            break;
        case 'اداره':
            $table = 'branch_departments';
            $col_name = 'branch_department_name';
            break;
        case 'اداره عامه':
            $table = 'main_departments';
            $col_name = 'main_department_name';
            break;
        case 'قسم':
            $table = 'sections';
            $col_name = 'section_name';
            break;
        default:
            # code...
            break;
    }
    include_once "../../conn/conn.php";
    $query_offices_type = mysqli_query($conn, "select distinct $col_name from $table");
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../../assets/css/count_dvice.css">
    </head>

    <body dir="rtl">
        <div class="middle">
            <div class="menu">
                <table class="">
                    <tr class="">
                        <th>مسلسل</th>
                        <th>اسم الوحده</th>
                    </tr>
                    <?php
                    $num = 0;
                    while ($row = mysqli_fetch_assoc($query_offices_type)) {
                        $num++
                            ?>
                        <tr>
                            <td>
                                <?php echo $num; ?>
                            </td>
                            <td>
                                <?php echo $row[$col_name]; ?>
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