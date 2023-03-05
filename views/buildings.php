<?php
include("../middleware/middleware_session.php");
session_login_auth('build');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>مبانى البريد المصرى</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/images/it1.svg" alt="" class="logo" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <style>
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
        <?php if ($_SESSION['role']) { ?>
            <ul class="navbar-nav ml-auto">
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <li>
                        <div class="btn-group bt_div">
                            <button class="btn" tabindex="0" aria-controls="example" data-bs-toggle="modal"
                                data-placement="right" title="اضافه مجموعه بريديه" id="" data-bs-target="#building_Group">
                                <label class="btn btn-primary">اضافه مبنى جديد</label>
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
        <ul class="navbar-nav ml-auto">
            <li>
                <?php include '../layout/header/user.php'; ?>
            </li>
            <li>
            </li>
        </ul>

    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <?php if ($_SESSION['build']) { ?>
                <div class="mt-5 mb-3">
                    <span class="p-3 badge btn-warning text-dark fs-5">المبانى</span>
                </div>
                <!-- [ Main Content ] start -->
                <div id="main">
                    <div id="pills-tabContent">
                        <div class="row" id="container_buildings">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include("../component/modals/building_group/add_office_group_modal.php") ?>
        <?php include("../component/modals/building_group/edit_office_group_modal.php") ?>
        <?php include("../component/modals/building_group/del_office_group_modal.php") ?>
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
    <script src="../assets/js/pcoded.min2.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../js/log/change_password.js"></script>
    <script src="../js/building_group/add_building.js"></script>
    <script src="../js/building_group/edit_building.js"></script>
    <script src="../js/building_group/del_building.js"></script>
    <script>
        function get_building_names() {
            var container_buildings = "";
            $.post(
                "../api/building/get_building_names.php",
                { x: "" },
                function (data) {
                    $.each(data, function (key, val) {
                        build_number = key + 1;
                        container_buildings += `
                    <div class='col-md-12 col-xl-2 text-center mb-4'>
                        <form class="card" method="post" target="_balnk" action="floors.php">
                        <div class="card-header">
                        <button type="button" class="btn btn-outline-info">${build_number}</button>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                            ?>
                                <button type="button" class="btn btn-outline-success" onclick='user_details_modal(${key})' title="تعديل اسم المبنى">
                                <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" onclick='del_building_modal(${key})' title=" حذف المبنى">
                                <i class="bi bi-trash"></i>
                                </button>

                        <?php } ?>
                        </div>    
                        <div class="card-body">
                                <i class="bi bi-building me-2 fs-1"></i>
                                <h5 class="card-title fs-3">${val['building_name']}</h5>
                                <input type="hidden" data-building_id="${val['building_id']}" name="building_id" value="${val['building_id']}">
                                <input type="hidden" data-building_name="${val['building_name']}"  name="building_name" value="${val['building_name']}">
                                <p class="card-text"></p>
                            </div>
                            <div class="m-2">
                                <input type="submit" class="btn btn-primary" value="التفاصيل">
                            </div>
                        </form>
                    </div>
                `
                    })
                        ;
                    $("#container_buildings").append(container_buildings);
                },
                "json"
            );
        }
        get_building_names()
    </script>
    <script>
        function user_details_modal(e) {
            building_name = $("form:eq(" + e + ") input[data-building_name]").data("building_name");
            building_id = $("form:eq(" + e + ") input[data-building_id]").data("building_id");
            $('#edit_building_group_input').val(building_name);
            $('#edit_building_group_input').data('edit_building_group_id', building_id);
            $("#Edit_Building_Group").modal("show");
        }
    </script>
    <script>
        function del_building_modal(e) {
            building_name = $("form:eq(" + e + ") input[data-building_name]").data("building_name");
            building_id = $("form:eq(" + e + ") input[data-building_id]").data("building_id");
            $('#del_building_group_input').val(building_name);
            $('#del_building_group_input').data('del_building_group_id', building_id);
            $("#del_building_group_error").text("");
            $("#Del_Building_Group").modal("show");
        }
    </script>
</body>

</html>