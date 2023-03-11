<?php
include("../middleware/middleware_session.php");
session_login_auth('dvice_office');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset=utf-8>
    <title>اجهزه مكتب </title>
    <link rel="icon" href="../../../build/assets/images/build.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/plugins/easy-autocomplete.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
    <style>
        /* */
        fieldset {
            text-align: center;
        }

        .input-group-text {
            background-color: var(--bs-teal);
            border: 1px solid var(--bs-teal);
        }

        .form-control {
            border: 1px solid var(--bs-teal);
        }

        .modal-content {
            border: 1px solid var(--bs-teal);
            border-radius: unset;

        }

        .dropdown .dropdown-menu {
            border: 1px solid var(--bs-teal);
        }


        /* */
        .filte_div {
            width: 40rem;
        }

        thead tr {
            background-color: #8fbc8f33;
        }

        tbody tr td:last-of-type button {
            float: left
        }

        .dataTables_info {
            display: inline-block
        }

        .easy-autocomplete {
            width: 100%
        }
    </style>
</head>

<body>
    <div class="pcoded-navbar navbar-collapsed">
        <?php include '..\layout\aside\nav.php'; ?>
    </div>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <?php include '..\layout\header\m-hader.html'; ?>
        <ul class="navbar-nav ">
            <li>
                <?php include '..\component\search.html'; ?>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li>
                <div class="btn-group bt_div">
                    <?php if ($_SESSION['add_dvice'] == 1) { ?>
                        <button class="btn disabled" tabindex="0" aria-controls="example" data-bs-toggle="modal"
                            data-placement="right" title="اضافه  الجهاز" id="add_dvice" data-bs-target="#Add_dvice_Modal">
                            <i class="btn btn-primary bi bi-plus"></i>
                        </button>
                    <?php } ?>
                    <a class="btn disabled" id="print_dvices" target="blank" tabindex="0" aria-controls="example"
                        data-placement="right" title="طباعه جرد المكتب">
                        <i class="btn btn-warning bi bi-printer"></i>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include '..\layout\header\user.php'; ?>
            </li>
        </ul>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="d-flex mt-5" style="margin:auto;width:90%">
                <div class="flex-grow-1">
                    <!-- start office deatails -->
                    <fieldset class="mb-3" id="details_offfice_field" style="/* display:none */">
                        <legend><i class="bi bi-info-lg"></i><span class="count me-2"></span></legend>
                        <table id="details_offfice" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th colspan='7' class='fs-5'></th>
                                </tr>
                                <tr>
                                    <th>الدور</th>
                                    <th>المبنى</th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end office deatails -->
                    <!-- start pc -->
                    <fieldset class="mb-3" id="dvice_office_pc_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-pc me-2 "></i>
                            <span class="count me-2" id="pc_office_count"></span>اجهزه
                        </legend>
                        <table class="table align-middle table-hover" id="dvice_office_pc" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th>PC Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end pc -->
                    <!-- srart monitor -->
                    <fieldset class="mb-3" id="dvice_office_monitor_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-display-fill me-2"></i>
                            <span class="count me-2" id="monitor_office_count"></span>شاشات
                        </legend>
                        <table id="dvice_office_monitor" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end montor -->
                    <!-- start printer -->
                    <fieldset class="mb-3" id="dvice_office_printer_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-printer-fill me-2"></i>
                            <span class="count me-2" id="printer_office_count"></span>طابعات
                        </legend>
                        <table id="dvice_office_printer" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end printer -->
                    <!-- strat network -->
                    <fieldset class="mb-3" id="dvice_office_network_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-hdd-network-fill me-2"></i>
                            <span class="count me-2" id="network_office_count"></span>اجهزه شبكه
                        </legend>
                        <table id="dvice_office_network" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th>IP</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end network -->
                    <!-- start postal -->
                    <fieldset class="mb-3" id="dvice_office_postal_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-envelope-paper-fill"></i>
                            <span class="count me-2" id="postal_office_count"></span>اجهزه بوستال
                        </legend>
                        <table id="dvice_office_postal" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end postal -->
                    <!-- start other -->
                    <fieldset class="mb-3" id="dvice_office_other_field" style="/* display:none */">
                        <legend>
                            <i class="bi bi-question-square-fill"></i>
                            <span class="count me-2" id="other_office_count"></span>اخرى
                        </legend>
                        <table id="dvice_office_other" class="table align-middle table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>نوعه</th>
                                    <th>سريال</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                    <!-- end other -->
                    <div class="clearfix"></div>
                    <!-- start footer -->
                    <!--<footer>-->
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php
        if ($_SESSION['edit'] == 1) {
            include '../component/modals/dvices_office/edit_modal_pc.php';
            include '../component/modals/dvices_office/delete_modal_pc.php';
        }
        if ($_SESSION['add_dvice'] == 1) {
            include '../component/modals/dvices_office/add_dvice_modal.php';
        }
        include '../component/modals/user_exit.php';
        include '../component/modals/user_password_change.php';
        ?>
    </div>
    <script src="../assets/js/plugins/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/jquery.easy-autocomplete.min.js"></script>
    <script src="../assets/js/pcoded.min2.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/DataTables/jquery.dataTables.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/dataTables.buttons.js"></script>
    <script src="../assets/DataTables/Buttons-2.2.3/js/buttons.print.js"></script>
    <script src="../js/dvices_office/live_search.js"></script>
    <script src="../js/log/change_password.js"></script>
    <script>
        var Settings = {
            dropdown_dvieces_office_url: `<?php include '../component/dropdown_dvieces_office.php' ?>`
        }
    </script>
    <script src="../data_tables/dvices_office.js"></script>
    <?php if ($_SESSION['edit'] == 1) { ?>
        <script src="../js/dvices_office/edit_dvice.js"></script>
        <script src="../js/dvices_office/delete_dvice.js"></script>
    <?php }

    if ($_SESSION['add_dvice'] == 1) { ?>
        <script src="../js/global/dismiss_modal_check.js"></script>
        <script src="../js/dvices_office/add_dvice.js"></script>
    <?php } ?>
</body>

</html>