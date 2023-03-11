<?php
session_start();
if (!empty($_SESSION['all_dvices'])) {
    $db = $_SESSION['db'];
    include '../conn/conn.php';

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="icon" href="../assets/images/build.svg" type="image/x-icon" />
        <link rel="stylesheet" href="../assets/css/m.css">
        <style>
            table {
                text-align: left;
                position: relative;
                border-collapse: collapse;
                top: 56px;
                width: 100%
            }

            thead {
                /* position: sticky; */
                text-align: center;
                background: white;
                top: 0;
                /* Don't forget this, required for the stickiness */
                box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
            }

            th,
            td {
                border: 1px solid
            }

            .pcoded-header {
                z-index: 1029;
                position: fixed;
                display: flex;
                min-height: 56px;
                padding: 0;
                top: 0;
                background: #fff;
                color: rgba(44, 62, 80, 0.8);
                width: 100%;
                transition: all 0.3s ease-in-out;
                background: #2c3e50;
            }

            .pcoded-header .navbar-nav {
                /* padding-left: 0;
                                                                              list-style: none;
                                                                              margin-bottom: 0;
                                                                              display: inline-flex;
                                                                              flex-direction: row; */
            }

            .pcoded-header .navbar-nav>li {
                line-height: 40px;
                display: inline-block;
                /* padding: 0 12px; */
            }

            .pcoded-header .navbar-nav>li:first-child {
                /* padding-left: 25px; */
            }

            .pcoded-header .navbar-nav>li:last-child {
                padding-right: 25px;
            }

            .pcoded-header:before,
            .pcoded-main-container:before {
                content: "";
                transition: all 0.3s ease-in-out;
            }
        </style>
    </head>

    <body dir="rtl">
        <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
            <ul class="navbar-nav ">
                <li>
                    <div class="d-flex filte_div" role="search"></div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    <div class="btn-group bt_div"></div>
                </li>
            </ul>
        </header>
        <div class="">
            <div class="">
                <table id="dvice_type_report">
                    <thead>
                        <tr class="">
                            <th>اسم الوحده البريديه</th>
                            <th>نوع الجهاز</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                            <th>الطابق</th>
                            <th>المبنى</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <script src="../assets/js/plugins/jquery.min.js"></script>
        <script src="../assets/DataTables/jquery.dataTables.js"></script>
        <script src="../assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
        <script src="../assets/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
        <script src="../assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
        <script>var b = '<?php echo $_GET['b'] ?>'; var id = '<?php echo $_GET['id'] ?>';</script>
        <script src="../data_tables/dvice_type_report.js"></script>
    </body>

    </html>
<?php } else {
    header('location:../views');
} ?>