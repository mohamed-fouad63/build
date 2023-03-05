<?php
session_start();
if (!$_SESSION) {
    header('location:/build/views/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>قاعده بيانات دعم فنى المناطق</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/images/it1.svg" alt="" class="logo" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <style>
        .dvices_count .pc {
            color: rgb(253 0 0);
            background-color: rgba(253 0 0 /20%);
        }

        .dvices_count .pc_list {
            background-color: rgba(253 0 0 /8%);
        }

        .dvices_count .monitor {
            color: rgb(220 53 69);
            background-color: rgba(220 53 69 /20%);
        }

        .dvices_count .monitor_list {
            background-color: rgba(220 53 69 /8%);
        }

        .dvices_count .printer {
            color: rgb(253 126 20);
            background-color: rgba(253 126 20 /20%);
        }

        .dvices_count .printer_list {
            background-color: rgba(253 126 20 /8%);
        }

        .dvices_count .pos {
            color: rgb(25 135 84);
            background-color: rgb(25 135 84 / 20%);
        }

        .dvices_count .pos_list {
            background-color: rgb(25 135 84 / 8%);
        }

        .dvices_count .scanner {
            color: rgb(32 201 151);
            background-color: rgba(32 201 151 /20%);
        }

        .dvices_count .scanner_list {
            background-color: rgba(32 201 151 /8%);
        }

        .dvices_count .parcode_printer {
            color: rgb(0 147 177);
            background-color: rgba(0 147 177 /20%);
        }

        .dvices_count .parcode_printer_list {
            background-color: rgba(0 147 177 /8%);
        }

        .dvices_count .weighter {
            color: rgb(92 145 45);
            background-color: rgba(92 145 45 /20%);
        }

        .dvices_count .weighter_list {
            background-color: rgba(92 145 45 /8%);
        }

        .dvices_count .displaying {
            color: rgb(123 153 7);
            background-color: rgba(123 153 7 /20%);
        }

        .dvices_count .displaying_list {
            background-color: rgba(123 153 7 /8%);
        }

        .dvices_count .network {
            color: rgb(172 153 7);
            background-color: rgba(172 153 7 /20%);
        }

        .dvices_count .network_list {
            background-color: rgba(172 153 7 /8%);
        }

        .card {
            height: unset;
        }
    </style>


</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <div class="navbar-collapsed pcoded-navbar" id="pcoded-navba">
        <?php include dirname(__FILE__) . '..\..\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include '..\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include '../layout/header/user.php'; ?>
            </li>
            <li>
            </li>
        </ul>

    </header>

    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <?php if ($_SESSION['all_dvices']) { ?>
                <div class="mt-5 mb-3">
                    <span class="p-3 badge btn-warning text-dark fs-5">احصائيات</span>
                </div>
                <!-- [ Main Content ] start -->
                <div id="main">
                    <div id="pills-tabContent">
                        <?php include dirname(__FILE__) . '..\..\layout\main\page-body\count-dvices.php'; ?>
                    </div>
                </div>
            <?php } ?>
            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include '../component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include '../component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
    </div>

    <!-- Required Js -->
    <script src="../assets/js/plugins/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/jquery.easy-autocomplete.min.js"></script>
    <script src="../assets/js/pcoded.min2.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/DataTables/jquery.dataTables.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="../js/log/change_password.js"></script>
    <?php
    if ($_SESSION['all_dvices']) { ?>
        <script src="../data_tables/index.js"></script>
    <?php } ?>
    <script>
        var count_office_type = "";
        $.post(
            "../api/dvice/count_office_type.php",
            { x: "" },
            function (data) {
                if (data.length == 0) {
                    count_office_type += `
                       <div class=''>
            <div class="card flat-card widget-primary-card">
                <div class="">
                    <div class="card-body text-center" style="background-color: #17A689;">
                        
                    </div>
                    <div class="ps-2">
                        <h4>لا يوجد وحدات بريديه مسجله . قم باضافه مجموعه بريديه ثم اضافه وحده بريديه
                        <a class="link-danger ps-2" href="../views/office_group.php">اضغط هنا</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
       `;
                } else {
                    $.each(data, function (key, val) {
                        count_office_type += `
                <div class='col-md-12 col-xl-2 text-center mb-3'>
            <div class="card flat-card widget-primary-card">
                <div class="row-table">
                    <div class="card-body" style="background-color: #17A689;">
                        <h4>${val}</h4>
                    </div>
                    <div class="col-sm-9">
                        <a href="../api/office/count_office.php?office_type=${key}" target="_blank" class="text-decoration-none" style="color:unset">
                        <h4>${key}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>`
                    })
                };
                $("#count_office_type").append(count_office_type);
            },
            "json"
        );
    </script>
</body>

</html>