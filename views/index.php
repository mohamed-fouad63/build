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
    <link rel="icon" href="../assets/images/build.svg" alt="" class="logo" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <style>
        .pc {
            color: rgb(253 0 0);
            background-color: rgba(253 0 0 /20%);
        }

        .dvices_count .pc_list {
            background-color: rgba(253 0 0 /8%);
        }

        .monitor {
            color: rgb(220 53 69);
            background-color: rgba(220 53 69 /20%);
        }

        .dvices_count .monitor_list {
            background-color: rgba(220 53 69 /8%);
        }

        .printer {
            color: rgb(253 126 20);
            background-color: rgba(253 126 20 /20%);
        }

        .dvices_count .printer_list {
            background-color: rgba(253 126 20 /8%);
        }


        .scanner {
            color: rgb(32 201 151);
            background-color: rgba(32 201 151 /20%);
        }

        .dvices_count .scanner_list {
            background-color: rgba(32 201 151 /8%);
        }


        .dvices_count .parcode_printer_list {
            background-color: rgba(0 147 177 /8%);
        }

        .weighter {
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

        .dvices_count .card {
            height: unset;
        }

        form.card {
            background-color: #c7ebd0;
        }

        .col-md-2-5 {
            flex: 0 0 auto;
            width: 20%;
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
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row" id="count_office_type">
                            </div>
                            <div class="row dvices_count">
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="../../build/api/dvice/count_dvices.php?id=pc" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header pc">
                                                <span class="fs-1" id="status"></span>
                                                <i class="bi bi-pc me-2 fs-1"></i>
                                                <span class="fs-2">اجهزه</span>
                                            </div>
                                        </a>
                                        <div class="pc_list">
                                            <div class="">
                                                <table class="table table-hover" id="pc_table">
                                                    <thead>
                                                        <tr></tr>
                                                        <tr></tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="../../build/api/dvice/count_dvices.php?id=monitor" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header monitor">
                                                <span class="fs-1" id="monitors_count"></span>
                                                <i class="bi bi-display-fill me-2 fs-1"></i>
                                                <span class="fs-2">شاشات</span>
                                            </div>
                                        </a>
                                        <div class="monitor_list">
                                            <div class="">
                                                <table class="table table-hover" id="monitor_table">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="../../build/api/dvice/count_dvices.php?id=printer" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header printer">
                                                <span class="fs-1" id="printers_count"></span>
                                                <i class="bi bi-printer-fill me-2 fs-1"></i>
                                                <span class="fs-2">طابعات ليزر</span>
                                            </div>
                                        </a>
                                        <div class="printer_list">
                                            <div class="">
                                                <table class="table table-hover" id="printer_table">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4">
                                        <a href="../../build/api/dvice/count_dvices.php?id=paper_scanner" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header printer">
                                                <span class="fs-1" id="paper_scanner_count"></span>
                                                <i class="bi bi-hr me-2 fs-1"></i>
                                                <span class="fs-2">ماسح ضوئى</span>
                                            </div>
                                        </a>
                                        <div class="scanner_list">
                                            <div class="">
                                                <table class="table table-hover" id="paper_printer_table">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <a href="../../build/api/dvice/count_dvices.php?id=scanner" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header scanner">
                                                <span class="fs-1" id="barcode_scanner_count"></span>
                                                <i class="bi bi-upc-scan me-2 fs-1"></i>
                                                <span class="fs-2">قوارئ باركود</span>
                                            </div>
                                        </a>
                                        <div class="scanner_list">
                                            <div class="">
                                                <table class="table table-hover" id="barcode_scanner_table">
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-4">
                                        <a href="../../build/api/dvice/count_dvices.php?id=barcode_printer" target="_blank"
                                            class="text-decoration-none fs-1">
                                            <div class="card-header scanner">
                                                <span class="fs-1" id="barcode_printer_count"></span>
                                                <i class="bi bi-upc me-2 fs-1"></i>
                                                <span class="fs-2">طابعه باركود</span>
                                            </div>
                                        </a>
                                        <div class="scanner_list">
                                            <div class="">
                                                <table class="table table-hover" id="barcode_printer_table">
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row mt-4" class="dvices_type" id="dvices_type">

                            </div>
                        </div>
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
            "../api/dvice/count_office_type.php", {
            x: ""
        },
            function (data) {
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
                });
                $("#count_office_type").append(count_office_type);
            },
            "json"
        );
    </script>
    <script>
        var count_dvice_type = "";
        $.post(
            "../api/dvice/count_dvice_type.php", {
            x: ""
        },
            function (data) {
                $.each(data, function (key, val) {
                    console.log(Object.keys(key))

                    val['pc'] == '' ? val['pc'] = '0' : val['pc'];
                    val['monitor'] == '' ? val['monitor'] = '0' : val['monitor'];
                    val['printer'] == '' ? val['printer'] = '0' : val['printer'];
                    val['postal'] == '' ? val['postal'] = '0' : val['postal'];
                    val['other'] == '' ? val['other'] = '0' : val['other'];
                    count_dvice_type += `
                    <div class="col-md-12 col-xl-3 text-center mb-4">
                                    <form class="card" method="post" target="_balnk" action="floors.php">
                                        <div class="card-body">
                                            <h5 class="card-title fs-3">${val['building_name']}</h5>
                                        </div>
                                        <div class="card-footer p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th><a class="btn pc" href="dvice_type_report.php?b=${val['building_id']}&id=pc" target="_blank"><i class="bi bi-pc fs-4"></i></a></th>
                                                        <th><a class="btn monitor" href="dvice_type_report.php?b=${val['building_id']}&id=monitor" target="_blank"><i class="bi bi-display-fill fs-4"></i></a></th>
                                                        <th><a class="btn printer" href="dvice_type_report.php?b=${val['building_id']}&id=printer" target="_blank"><i class="bi bi-printer-fill fs-4"></i></a></th>
                                                        <th><a class="btn scanner" href="dvice_type_report.php?b=${val['building_id']}&id=postal" target="_blank"><i class="bi bi-envelope-paper-fill fs-4"></a></i></th>
                                                        <th><a class="btn weighter" href="dvice_type_report.php?b=${val['building_id']}&id=other" target="_blank"><i class="bi bi-question-square-fill fs-4"></a></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="fs-4 pc">${val['pc']}</td>
                                                        <td class="fs-4 monitor">${val['monitor']}</td>
                                                        <td class="fs-4 printer">${val['printer']}</td>
                                                        <td class="fs-4 scanner">${val['postal']}</td>
                                                        <td class="fs-4 weighter">${val['other']}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                                `
                });
                $("#dvices_type").append(count_dvice_type);
            },
            "json"
        );
    </script>
</body>

</html>