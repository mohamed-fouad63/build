<?php
include("../middleware/middleware_session.php");
session_login_auth('all_dvices');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه كل المكاتب</title>
    <link rel="icon" href="../../../build/assets/images/build.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
    <style>
        #main {
            position: relative;
            top: 35px;
        }

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dt-buttons,
        table thead #filterboxrow {
            display: none
        }

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        table tr {
            text-align: center;
        }

        table tbody tr td:nth-of-type(6),
        tbody tr td:nth-of-type(7) {
            text-align: end;
        }

        .filte_div {
            width: 30rem;
        }

        th.sorting.sorting_asc:after {
            content: "\F124";
            font-family: 'bootstrap-icons';
            position: relative;
            display: block;
            opacity: 1;
            right: 80%;
            line-height: 9px;
            font-size: .9em;
        }
    </style>
</head>

<body>
    <div class="navbar-collapsed pcoded-navbar">
        <?php include '..\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include '..\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ">
            <li>
                <div class="d-flex filte_div" role="search"></div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li>
                <div class="btn-group bt_div"></div>
            </li>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="p-2 info_div"></div>
                </li>
            </ul>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include '..\layout\header\user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div id="main">
                <table id="example" class="table table-hover" style="width:100%">
                    <thead id="tablehead">
                        <tr id="filterboxrow">
                            <th> م</th>
                            <th>مبنى</th>
                            <th>الدور</th>
                            <th>المكتب</th>
                            <th>نوع الجهاز</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                        </tr>
                        <tr id="controlPanel">
                            <th>م</th>
                            <th>مبنى</th>
                            <th>الدور</th>
                            <th>المكتب</th>
                            <th>نوع الجهاز</th>
                            <th>موديل الجهاز</th>
                            <th>السريال</th>
                            <th>IP</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php include '../component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include '../component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>
    <script src="../assets/js/plugins/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/pcoded.min2.js"></script>
    <script src="../assets/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="../assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../js/log/change_password.js"></script>
    <script src="../data_tables/all_dvices.js"></script>
</body>

</html>