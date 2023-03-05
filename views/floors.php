<?php
include("../middleware/middleware_session.php");
session_login_auth('build');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>طوابق مبنى</title>
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
        <ul class="navbar-nav ml-auto">
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li>
                    <div class="btn-group bt_div">
                        <button class="btn" tabindex="0" aria-controls="example" data-bs-toggle="modal"
                            data-placement="right" title="اضافه طابق جديد" id="" data-bs-target="#Add_Floor_Modal">
                            <label class="btn btn-primary">اضافه طابق جديد</label>
                        </button>
                    </div>
                </li>
            <?php } ?>
        </ul>
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

            <div class="mt-5 mb-3">
                <span class="p-3 badge btn-warning text-dark fs-5">
                    <?php echo $_POST['building_name']; ?>
                </span>
            </div>
            <!-- [ Main Content ] start -->
            <div id="main">
                <div id="pills-tabContent">
                    <div class="row" id="container_building_floors">
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include("../component/modals/building_group/add_floor_modal.php") ?>
        <?php include("../component/modals/building_group/edit_floor_modal.php") ?>
        <?php include("../component/modals/building_group/del_floor_modal.php") ?>
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
    <script src="../js/log/change_password.js"></script>
    <script>
        var post_data = {
            building_name: '<?= $_POST['building_name'] ?>',
            building_id: '<?= $_POST['building_id'] ?>',
        }
    </script>
    <script src="../js/building_group/add_floor.js"></script>
    <script src="../js/building_group/edit_floor.js"></script>
    <script src="../js/building_group/del_floor.js"></script>
    <script>
        function get_building_floors() {
            var container_building_floors = "";
            $.post(
                "../api/building/get_building_floors.php",
                { building_id: post_data.building_id },
                function (data) {
                    $.each(data, function (key, val) {
                        container_building_floors += `
                <div class='col-md-12 col-xl-2 text-center mb-4'>
    <form class="card" method="post" target="_balnk" action="sectors.php">
                            <div class="card-header">
                        <button type="button" class="btn btn-outline-info">${val['floor_id']}</button>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                            ?>
                            <button type="button" class="btn btn-outline-success" data-index_id="${val['id']}" data-building_id="${val['building_id']}" onclick='user_details_modal(${key})' title="تعديل اسم الدور او ترتيبه">
                            <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick='del_floor_modal(${key})' title=" حذف الدور">
                            <i class="bi bi-trash"></i>
                            </button>
                        <?php } ?>
                        </div>  
  <div class="card-body">
  <i class="bi bi-layers-fill me-2 fs-1"></i>
    <h5 class="card-title fs-3">${val['floor_name']}</h5>
    <input type="hidden" name="floor_id" data-floor_id="${val['floor_id']}" value="${val['floor_id']}">
    <input type="hidden" name="floor_name" data-floor_name="${val['floor_name']}" value="${val['floor_name']}">
    <input type="hidden" name="building_id" data-building_id="${val['building_id']}" value="${val['building_id']}">
    <input type="hidden" name="building_name" data-building_name="${val['building_name']}" value="${val['building_name']}">
    <p class="card-text"></p>
  </div>
  <div class="m-2">
<input type="submit" class="btn btn-primary" value="التفاصيل">
  </div>
</form>
</div>
</div>
        `
                    });
                    $("#container_building_floors").append(container_building_floors);
                },
                "json"
            );
        }

        get_building_floors()
    </script>
    <script>
        function user_details_modal(e) {
            floor_name = $("form:eq(" + e + ") input[data-floor_name]").data("floor_name");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            index_id = $("form:eq(" + e + ") button[data-index_id]").data("index_id");
            building_id = $("form:eq(" + e + ") button[data-building_id]").data("building_id");
            $('#edit_floor_name_input').val(floor_name);
            $('#edit_floor_id_input').val(floor_id);
            $('#edit_floor_id_input').data('index_id', index_id);
            $('#edit_floor_id_input').data('old_floor_id', floor_id);
            $('#edit_floor_id_input').data('old_floor_name', floor_name);
            $('#edit_floor_id_input').data('building_id', building_id);
            $("#Edit_Floor_Modal").modal("show");
        }
    </script>
    <script>
        function del_floor_modal(e) {
            floor_name = $("form:eq(" + e + ") input[data-floor_name]").data("floor_name");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            building_id = $("form:eq(" + e + ") button[data-building_id]").data("building_id");
            $("#del_floor_name_error").text("اسم الطابق").css("color", "#212529");
            $('#del_floor_name_input').val(floor_name);
            $('#del_floor_id_input').val(floor_id);
            $('#del_floor_id_input').data('floor_id', floor_id);
            $('#del_floor_id_input').data('floor_name', floor_name);
            $('#del_floor_id_input').data('building_id', building_id);
            $("#Del_Floor_Modal").modal("show");
        }
    </script>
</body>

</html>