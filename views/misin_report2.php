<?php


if(!$_SESSION){
    header('location:/it2/views/login.php');
}

include "../../conn/conn.php";
$it_name = $_POST['it_name'];
$office_name = $_POST['select_office_name'];
$mission_date_start = $_POST['mission_date_start'];
$mission_date_end = $_POST['mission_date_end'];
$mission_type = $_POST['mission_type'];
$start_time = $_POST['mission_time_start'];
$end_time = $_POST['mission_time_end'];
$Network_Status = $_POST['Network_Status'];
$Network_points = $_POST['Network_points'];
$pc_damage = $_POST['pc_damage'];
$pc_program = $_POST['pc_program'];
$pc_os = $_POST['pc_os'];
$does = $_POST['does'];

$date = $mission_date_start;
date_default_timezone_set('Africa/Cairo');
$nameOfDay = date('D', strtotime($date));

$query_office_name = mysqli_query($conn, "select * from all1 where office_name LIKE '$office_name'");
$query1 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'pc'");
$rowcount1 = mysqli_num_rows($query1);
$query2 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'MONITOR'");
$rowcount2 = mysqli_num_rows($query2);
$query3 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'PRINTER'");
$rowcount3 = mysqli_num_rows($query3);
$query4 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'pos' AND dvice_name like '% VX 510%'
OR
office_name LIKE '$office_name' AND id like 'pos' AND dvice_name like '%BITEL%'
OR
office_name LIKE '$office_name' AND id like 'pos' AND dvice_name like '%VERIFONE V200T%'
");
$rowcount4 = mysqli_num_rows($query4);
$query5 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'pos' AND dvice_name like '% VX 520%' OR
office_name LIKE '$office_name' AND id like 'pos' AND dvice_name like '%vx 675%'");
$rowcount5 = mysqli_num_rows($query5);
$query6 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'postal' AND dvice_name  like 'METTLER TOLEDO SCALE'");
$rowcount6 = mysqli_num_rows($query6);
$query7 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'postal' AND dvice_name  like 'Barcode printer%'");
$rowcount7 = mysqli_num_rows($query7);
$query8 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'postal' AND dvice_name  like 'BARCODE SCANNER%'");
$rowcount8 = mysqli_num_rows($query8);
$query9 = mysqli_query($conn, "select * from dvice where office_name LIKE '$office_name' AND id like 'postal' AND dvice_name  like 'BIXOLON %'");
$rowcount9 = mysqli_num_rows($query9);
?>

<?php
switch ($nameOfDay) {
    case "Fri":
        $nameOfDay = "الجمعه";
        break;
    case "Sat":
        $nameOfDay = "السبت";
        break;
    case "Sun":
        $nameOfDay = "الأحد";
        break;
    case "Mon":
        $nameOfDay = "الأثنين";
        break;
    case "Tue":
        $nameOfDay = "الثلاثاء";
        break;
    case "Wed":
        $nameOfDay = "الأربعاء";
        break;
    case "Thu":
        $nameOfDay = "الخميس";
        break;
}
if ($nameOfDay == "الجمعه") {
    echo '<script>alert("لا توجد ماموريات يوم الجمعه نهائيا");</script>';
} else {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="../assets/css/web-fonts-with-css/css/all.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/print_test.css">
        <style>
            .username {
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 0;
                margin-top: 0;
            }
            fieldset {
    margin: -10px;
}
        </style>
            <script type="text/javascript">
    var replaceDigits = function () {
      var map = ["&#x0660;", "&#x0661;", "&#x0662", "&#x0663", "&#x0664;", "&#x0665", "&#x0666", "&#x0667", "&#x0668", "&#x0669"]
      document.body.innerHTML = document.body.innerHTML.replace(/\d(?=[^<>]*(<|$))/g, function ($0) { return map[$0] });
    }
    window.onload = replaceDigits;
  </script>
    </head>

    <body dir="rtl">
        <div class="page">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه الماموريه </button>
                <button type="button" class="btn btn-warning" onclick="window.close()" data-dismiss="modal">تم</button>
            </div>
            <form method="post">
                <label class='username'>القائم بالمرور / محمد فؤاد</label>
                <fieldset>
                    <legend>
                        <span class="badge">بيانات المكتب</span>
                    </legend>
                    <table class="">
                        <tr>
                            <th>المجموعه</th>
                            <th>اسم المكتب</th>
                            <th>الرقم المالى</th>
                            <th>التليفون</th>
                            <th>التاريخ</th>
                            <th>خطه \ بلاغ</th>
                            <th> الحضور</th>
                            <th> الانصراف</th>
                        </tr>
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($query_office_name)) {
                                $g3 = $row["3G"];
                                $ll = $row["LL"];
                                $domain_name = $row["domain_name"];
                                $money_code = $row["money_code"];
                                $post_group = $row["post_group"];
                                $office_type = $row["office_type"];
                                $office_name = $row["office_name"];
                                $tel = $row["tel"];
                            } ?>
                            <td><?php echo $post_group; ?></td>
                            <td><?php echo $office_name; ?></td>
                            <td><?php echo $money_code; ?></td>
                            <td><?php echo $tel; ?></td>
                            <td class="td100"><?php echo $mission_date_start; ?></td>
                            <td><?php echo $mission_type; ?></td>
                            <td><?php echo $start_time; ?></td>
                            <td><?php echo $end_time; ?></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset id="network">
                    <legend>
                        <span class="badge">بيانات الشبكه</span>
                    </legend>
                    <table>
                        <tr>
                            <th>حاله الشبكه</th>
                            <th>هل المكتب يحتاج لنقاط شبكه</th>
                            <th>LEASD LINE</th>
                            <th>3G</th>
                        </tr>
                        <tr>
                            <td><?php echo $Network_Status; ?></td>
                            <td><?php echo $Network_points; ?></td>
                            <td><?php echo $ll; ?></td>
                            <td><?php echo $g3; ?></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset id="dvice">
                    <legend><span class="badge">بيان و حاله الاجهزه </span></legend>
                    <table>
                        <tr>
                            <th>عدد الاجهزه</th>
                            <th>عدد الشاشات</th>
                            <th>عدد الطابعات</th>
                            <th>عدد pos البريد</th>
                            <th>عدد pos efiniance</th>
                            <th>ميزان</th>
                            <th>طابعه باركود</th>
                            <th>قارئ باركود</th>
                            <th> شاشه عميل</th>
                        </tr>
                        <tr>
                            <td><?php echo $rowcount1; ?></td>
                            <td><?php echo $rowcount2; ?></td>
                            <td><?php echo $rowcount3; ?></td>
                            <td><?php echo $rowcount4; ?></td>
                            <td><?php echo $rowcount5; ?></td>
                            <td><?php echo $rowcount6; ?></td>
                            <td><?php echo $rowcount7; ?></td>
                            <td><?php echo $rowcount8; ?></td>
                            <td><?php echo $rowcount9; ?></td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <th colspan="3">هل يوجد اعطال بالاجهزه</th>
                            <th colspan="3">هل تم تنزيل برامج الخدمات و البرامج المساعده و مكافح الفيروسات</th>
                            <th colspan="2">هل نظام التشغيل النسخه المعتمده من قطاع الدعم الفنى</th>
                        </tr>
                        <tr>
                            <td colspan="3"><?php echo $pc_damage; ?></td>
                            <td colspan="3"><?php echo $pc_program; ?></td>
                            <td colspan="2"><?php echo $pc_os; ?></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset id="service">
                    <legend><span class="badge"> الخدمات </span></legend>
                    <table>

                        <tr>
                            <th>الشباك الموحد</th>
                            <th>مراقبه النقديه</th>
                            <th>الحوالات الفوريه</th>
                            <th>التحصيل و الاخطار</th>
                            <th>المصريه لاتصالات</th>
                            <th>منظومه الطوابع</th>
                        </tr>
                        <tr>
                            <td><?php if (isset($_POST['shm'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                }  ?></td>
                            <td><?php if (isset($_POST['mn'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['hf'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['th'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['et'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['tw'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            
                        </tr>
                        <tr>
                            <th>مصر الرقميه</th>
                            <th>البريد الالكترونى</th>
                            <th>باك اوفيس</th>
                            <th>فرونت اوفيس</th>
                            <th>موقع المنشورات</th>
                            <th>الحوالات الخارجيه</th>
                        </tr>
                        <tr>
                            <td><?php if (isset($_POST['des'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                                <td><?php if (isset($_POST['email'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['bo'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['fo'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['mnsh'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['hkh'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset id="tools">
                    <legend><span class="badge"> مستلزمات التشغيل </span></legend>
                    <table>
                        <tr>
                            <th>حباره</th>
                            <th>درام</th>
                            <th>لوحه مفاتيح</th>
                            <th>ماوس</th>
                        </tr>
                        <tr>
                            <td><?php if (isset($_POST['toner'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['dram'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['keyboard'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                            <td><?php if (isset($_POST['mouse'])) {
                                    echo "<i class='fas fa-check'></i>";
                                } else {
                                    echo "<i class='fas fa-times'></i>";
                                } ?></td>
                        </tr>
                    </table>
                </fieldset>
                <table>
                    <tr>
                        <th colspan="">ما تم عمله</th>
                    </tr>
                    <tr>
                        <td colspan=""><?php echo $does; ?></td>
                    </tr>
                </table>
                    <div class="">
                        <label style="float:right;">اخصائى تشغيل نظم</label>
                        <label style="text-align: center;">ختم المكتب</label>
                        <label style="float:left;">وكيل المكتب</label>
                    </div>
            <?php } ?>
            <!--
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه الماموريه </button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='my_misin.php'" data-dismiss="modal">تم</button>
                </div>
                    -->
            </form>
        </div>
        <div class="page">
            <div class="containermissin">
                <div class="missinletter">
                    <div class="missintitle">خطاب انهاء الماموريه</div>
                    <div class="missinto">
                        <label>
                            السيد الاستاذ / مدير عام الاداره العامة لمنطقة بريد  
                        </label>
                    </div>
                    <div class="missintro">
                        <label>
                            بعد التحيه
                        </label>
                    </div>
                    <div class="missinbody">
                        <div class="missinsection">
                            <span>تم اليوم <?php echo $mission_date_start; ?></span>
                            <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                            <span> وذلك بناء على <?php echo $mission_type; ?></span>
                        </div>
                        <div class="missinsection">
                            <span>ساعة الحضور : <?php echo $start_time; ?></span>
                            <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                            <span>وقد تم عمل الاتى : -</span>
                        </div>
                        <div class="missinsection"><?php echo $does; ?>
                        </div>
                    </div>
                    <div class="">
                        <label style="float:right;">اخصائى تشغيل نظم</label>
                        <label style="text-align: center;">ختم المكتب</label>
                        <label style="float:left;">وكيل المكتب</label>
                    </div>
                </div>
                <div class="missinletter">
                    <div class="missintitle">خطاب انهاء الماموريه</div>
                    <div class="missinto">
                        <label>
                            السيد الاستاذ / مدير عام الاداره العامة لمنطقة بريد  
                        </label>
                    </div>
                    <div class="missintro">
                        <label>
                            بعد التحيه
                        </label>
                    </div>
                    <div class="missinbody">
                        <div class="missinsection">
                            <span>تم اليوم <?php echo $mission_date_start; ?></span>
                            <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                            <span> وذلك بناء على <?php echo $mission_type; ?></span>
                        </div>
                        <div class="missinsection">
                            <span>ساعة الحضور : <?php echo $start_time; ?></span>
                            <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                            <span>وقد تم عمل الاتى : -</span>
                        </div>
                        <div class="missinsection"><?php echo $does; ?>
                        </div>
                    </div>
                    <div class="">
                        <label style="float:right;">اخصائى تشغيل نظم</label>
                        <label style="text-align: center;">ختم المكتب</label>
                        <label style="float:left;">وكيل المكتب</label>
                    </div>
                </div>
                <div class="missinletter">
                    <div class="missintitle">خطاب انهاء الماموريه</div>
                    <div class="missinto">
                        <label>
                            السيد الاستاذ / مدير عام منطقة بريد  
                        </label>
                    </div>
                    <div class="missintro">
                        <label>
                            بعد التحيه
                        </label>
                    </div>
                    <div class="missinbody">
                        <div class="missinsection">
                            <span>تم اليوم <?php echo $mission_date_start; ?></span>
                            <span>المرور على <?php echo $office_type . " " . $office_name; ?></span>
                            <span> وذلك بناء على <?php echo $mission_type; ?></span>
                        </div>
                        <div class="missinsection">
                            <span>ساعة الحضور : <?php echo $start_time; ?></span>
                            <span>ساعة الانصراف : <?php echo $end_time; ?></span>
                            <span>وقد تم عمل الاتى : -</span>
                        </div>
                        <div class="missinsection"><?php echo $does; ?>
                        </div>
                    </div>
                    <div class="">
                        <label style="float:right;">اخصائى تشغيل نظم</label>
                        <label style="text-align: center;">ختم المكتب</label>
                        <label style="float:left;">وكيل المكتب</label>
                    </div>
                </div>
            </div>
        </div>
        <div class=" page">
            <div class="missinmsgto">
                <div class="centering rotating">
                    <h3>قسم الدعم الفنى </h3>
                    <h3>الى</h3>
                </div>
            </div>
            <div class="missinmsgfrom">
                <div class="centering">
                    <h3>الراسل</h3>
                    <h3><?php echo "محمد فؤاد"  ?></h3>
                    <h4><?php echo $office_name; ?></h4>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php