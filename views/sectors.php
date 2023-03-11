<?php
include("../middleware/middleware_session.php");
session_login_auth('build');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>قطاعات
        <?php echo $_POST['floor_name'] ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/images/build.svg" alt="" class="logo" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="../assets/fonts/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/layout-rtl2.css">
    <link rel="stylesheet" href="../assets/css/plugins/perfect-scrollbar.css">
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
                            data-placement="right" title="اضافه قطاع جديد " id="" data-bs-target="#Add_Sector_Modal">
                            <label class="btn btn-primary">اضافه قطاع جديد </label>
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
                <form>
                    <span class="p-3 badge btn-warning text-dark fs-5">
                        <?php echo $_POST['floor_name']; ?>
                    </span>
                    <input type="hidden" name="building_name" value="<?php echo $_POST['building_name']; ?>">
                    <input type="hidden" name="building_id" value="<?php echo $_POST['building_id']; ?>">
                    <button class="btn p-3 badge btn-warning text-dark fs-5" formaction="floors.php" formmethod="post">
                        <?php echo $_POST['building_name']; ?>
                    </button>
                </form>
            </div>
            <!-- [ Main Content ] start -->
            <div id="main">
                <div id="pills-tabContent">
                    <div class="row" id="container_floor_sectors">
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include("../component/modals/building_group/add_sector_modal.php") ?>
        <?php include("../component/modals/building_group/edit_sector_modal.php") ?>
        <?php include("../component/modals/building_group/del_sector_modal.php") ?>
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
            floor_name: '<?= $_POST['floor_name'] ?>',
            floor_id: '<?= $_POST['floor_id'] ?>',
        }
    </script>
    <script src="../js/building_group/add_sector.js"></script>
    <script src="../js/building_group/edit_sector.js"></script>
    <script src="../js/building_group/del_sector.js"></script>
    <script>
        function get_floor_sectors() {
            var container_floor_sectors = "";
            $.post(
                "../api/building/get_floor_sectors.php",
                { building_id: post_data.building_id, floor_id: post_data.floor_id },
                function (data) {
                    $.each(data, function (key, val) {
                        floor_number = key + 1;
                        container_floor_sectors += `
                <div class='col-md-12 col-xl-2 text-center'>
    <form class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-info">${floor_number}</button>
                         <?php
                         if ($_SESSION['role'] == 'admin') {
                             ?>
                                    <button type="button" class="btn btn-outline-success" data-building_id="${val['building_id']}" onclick='user_details_modal(${key})' title="تعديل اسم القطاع">
                                    <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" onclick='del_sector_modal(${key})' title=" حذف القطاع">
                                    <i class="bi bi-trash"></i>
                                    </button>
                        <?php } ?>
                    </div>  
  <div class="card-body">
  <i class="bi bi-pie-chart-fill me-2 fs-1"></i>
    <h5 class="card-title fs-3">${val['sector_name']}</h5>
    <input type="hidden" name="sector_id" data-sector_id="${val['sector_id']}" value="${val['sector_id']}">
    <input type="hidden" name="sector_name" data-sector_name="${val['sector_name']}" value="${val['sector_name']}">
    <input type="hidden" name="floor_id" data-floor_id = "${val['floor_id']}" value="${val['floor_id']}">
    <input type="hidden" name="floor_name" value="${val['floor_name']}">
    <input type="hidden" name="building_id" data-building_id="${val['building_id']}" value="${val['building_id']}">
    <input type="hidden" name="building_name" value="${val['building_name']}">
    <p class="card-text"></p>
  </div>
  <div class="m-2">
<input type="submit" formtarget="_balnk" formmethod="post" formaction="main_department.php" class="btn btn-primary" value="التفاصيل">
  </div>
</form>
</div>
</div>
        `
                    });
                    $("#container_floor_sectors").append(container_floor_sectors);
                },
                "json"
            );
        }

        get_floor_sectors()
    </script>
    <script>
        function user_details_modal(e) {
            e++;
            sector_name = $("form:eq(" + e + ") input[data-sector_name]").data("sector_name");
            sector_id = $("form:eq(" + e + ") input[data-sector_id]").data("sector_id");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            building_id = $("form:eq(" + e + ") button[data-building_id]").data("building_id");
            $("#edit_sector_error").text("");
            $('#edit_sector_input').val(sector_name);
            $('#edit_sector_input').data('old_sector_name', sector_name);
            $('#edit_sector_input').data('sector_id', sector_id);
            $('#edit_sector_input').data('floor_id', floor_id);
            $('#edit_sector_input').data('building_id', building_id);
            $("#Edit_Sector_Modal").modal("show");
        }
    </script>
    <script>
        function del_sector_modal(e) {
            e++;
            sector_name = $("form:eq(" + e + ") input[data-sector_name]").data("sector_name");
            sector_id = $("form:eq(" + e + ") input[data-sector_id]").data("sector_id");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            building_id = $("form:eq(" + e + ") button[data-building_id]").data("building_id");

            $('#del_sector_error').text('');
            $('#del_sector_input').val(sector_name);
            $('#del_sector_input').data('sector_name', sector_name);
            $('#del_sector_input').data('sector_id', sector_id);
            $('#del_sector_input').data('floor_id', floor_id);
            $('#del_sector_input').data('building_id', building_id);
            $("#Del_Sector_Modal").modal("show");
        }
    </script>
</body>

</html>