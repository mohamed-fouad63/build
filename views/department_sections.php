<?php
include("../middleware/middleware_session.php");
session_login_auth('build');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>اقسام</title>
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
                            data-placement="right" title="اضافه قسم جديد" id=""
                            data-bs-target="#Add_Department_Section_Modal">
                            <label class="btn btn-primary">اضافه قسم جديد</label>
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
                    <input type="hidden" name="main_department_id" value="<?php echo $_POST['main_department_id']; ?>">
                    <input type="hidden" name="main_department_name"
                        value="<?php echo $_POST['main_department_name']; ?>">
                    <input type="hidden" name="sector_id" value="<?php echo $_POST['sector_id']; ?>">
                    <input type="hidden" name="sector_name" value="<?php echo $_POST['sector_name']; ?>">
                    <input type="hidden" name="floor_id" value="<?php echo $_POST['floor_id']; ?>">
                    <input type="hidden" name="floor_name" value="<?php echo $_POST['floor_name']; ?>">
                    <input type="hidden" name="building_id" value="<?php echo $_POST['building_id']; ?>">
                    <input type="hidden" name="building_name" value="<?php echo $_POST['building_name']; ?>">
                    <span class="p-3 badge btn-warning text-dark fs-5">
                        <?php echo $_POST['branch_department_name']; ?>
                    </span>
                    <button class="btn p-3 badge btn-warning text-dark fs-5" formaction="branch_department.php"
                        formmethod="post">
                        <?php echo $_POST['main_department_name']; ?>
                    </button>
                    <button class="btn p-3 badge btn-warning text-dark fs-5" formaction="main_department.php"
                        formmethod="post">
                        <?php echo $_POST['sector_name']; ?>
                    </button>
                    <button class="btn p-3 badge btn-warning text-dark fs-5" formaction="sectors.php" formmethod="post">
                        <?php echo $_POST['floor_name']; ?>
                    </button>
                    <button class="btn p-3 badge btn-warning text-dark fs-5" formaction="floors.php" formmethod="post">
                        <?php echo $_POST['building_name']; ?>
                    </button>
                </form>
            </div>
            <!-- [ Main Content ] start -->
            <div id="main">
                <div id="pills-tabContent">
                    <div class="row" id="container_sections">
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include("../component/modals/building_group/add_department_section_modal.php") ?>
        <?php include("../component/modals/building_group/edit_department_section_modal.php") ?>
        <?php include("../component/modals/building_group/del_department_section_modal.php") ?>
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
            sector_name: '<?= $_POST['sector_name'] ?>',
            sector_id: '<?= $_POST['sector_id'] ?>',
            main_department_name: '<?= $_POST['main_department_name'] ?>',
            main_department_id: '<?= $_POST['main_department_id'] ?>',
            branch_department_name: '<?= $_POST['branch_department_name'] ?>',
            branch_department_id: '<?= $_POST['branch_department_id'] ?>'
        }
    </script>
    <script src="../js/building_group/add_department_section.js"></script>
    <script src="../js/building_group/edit_department_section.js"></script>
    <script src="../js/building_group/del_department_section.js"></script>
    <script>
        function get_main_branch_departments() {
            var container_sections = "";
            $.post(
                "../api/building/get_department_sections.php",
                {
                    building_id: post_data.building_id,
                    floor_id: post_data.floor_id,
                    sector_id: post_data.sector_id,
                    main_department_id: post_data.main_department_id,
                    branch_department_id: post_data.branch_department_id
                },
                function (data) {
                    $.each(data, function (key, val) {
                        branch_department_number = key + 1;
                        container_sections += `
                <div class='col-md-12 col-xl-2 text-center'>
    <form class="card" method="post" target="_balnk" action="">
                                <div class="card-header">
                        <button type="button" class="btn btn-outline-info">${branch_department_number}</button>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                            ?>
                                <button type="button" class="btn btn-outline-success" onclick='user_details_modal(${key})' title="تعديل اسم القطاع">
                                <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" onclick='del_section_modal(${key})' title="حذف القسم">
                                <i class="bi bi-trash"></i>
                                </button>
                        <?php } ?>
                    </div> 
  <div class="card-body">
  <i class="bi bi-diagram-2-fill me-2 fs-1"></i>
    <h5 class="card-title fs-3">${val['section_name']}</h5>
    <input type="hidden" name="branch_department_name" data-section_name="${val['section_name']}" value="${val['section_name']}">
    <input type="hidden" name="branch_department_name" data-section_id="${val['section_id']}" value="${val['section_id']}">
    <input type="hidden" name="branch_department_id" data-branch_department_id="${val['branch_department_id']}" value="${val['branch_department_id']}">
    <input type="hidden" name="main_department_id" data-main_department_id="${val['main_department_id']}" value="${val['main_department_id']}">
    <input type="hidden" name="main_department_name" value="${val['main_department_name']}">
    <input type="hidden" name="sector_id" data-sector_id="${val['sector_id']}" value="${val['sector_id']}">
    <input type="hidden" name="sector_name" value="${val['sector_name']}">
    <input type="hidden" name="floor_id" data-floor_id="${val['floor_id']}" value="${val['floor_id']}">
    <input type="hidden" name="floor_name" value="${val['floor_name']}">
    <input type="hidden" name="building_id" data-building_id="${val['building_id']}" value="${val['building_id']}">
    <input type="hidden" name="building_name" value="${val['building_name']}">
    <p class="card-text"></p>
  </div>
</form>
</div>
</div>
        `
                    });
                    $("#container_sections").append(container_sections);
                },
                "json"
            );
        }

        get_main_branch_departments()
    </script>
    <script>
        function user_details_modal(e) {
            e++;
            section_name = $("form:eq(" + e + ") input[data-section_name]").data("section_name");
            section_id = $("form:eq(" + e + ") input[data-section_id]").data("section_id");
            branch_department_id = $("form:eq(" + e + ") input[data-branch_department_id]").data("branch_department_id");
            main_department_id = $("form:eq(" + e + ") input[data-main_department_id]").data("main_department_id");
            sector_id = $("form:eq(" + e + ") input[data-sector_id]").data("sector_id");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            building_id = $("form:eq(" + e + ") input[data-building_id]").data("building_id");
            $('#edit_department_section_input').val(section_name);
            $('#edit_department_section_input').data('old_section_name', section_name);
            $('#edit_department_section_input').data('section_id', section_id);
            $('#edit_department_section_input').data('branch_department_id', branch_department_id);
            $('#edit_department_section_input').data('main_department_id', main_department_id);
            $('#edit_department_section_input').data('sector_id', sector_id);
            $('#edit_department_section_input').data('floor_id', floor_id);
            $('#edit_department_section_input').data('building_id', building_id);
            $("#Edit_Department_Section_Modal").modal("show");
        }
    </script>
    <script>
        function del_section_modal(e) {
            e++;
            section_name = $("form:eq(" + e + ") input[data-section_name]").data("section_name");
            section_id = $("form:eq(" + e + ") input[data-section_id]").data("section_id");
            branch_department_id = $("form:eq(" + e + ") input[data-branch_department_id]").data("branch_department_id");
            main_department_id = $("form:eq(" + e + ") input[data-main_department_id]").data("main_department_id");
            sector_id = $("form:eq(" + e + ") input[data-sector_id]").data("sector_id");
            floor_id = $("form:eq(" + e + ") input[data-floor_id]").data("floor_id");
            building_id = $("form:eq(" + e + ") input[data-building_id]").data("building_id");
            $("#del_department_section_error").text("");
            $('#del_department_section_input').val(section_name);
            $('#del_department_section_input').data('section_name', section_name);
            $('#del_department_section_input').data('section_id', section_id);
            $('#del_department_section_input').data('branch_department_id', branch_department_id);
            $('#del_department_section_input').data('main_department_id', main_department_id);
            $('#del_department_section_input').data('sector_id', sector_id);
            $('#del_department_section_input').data('floor_id', floor_id);
            $('#del_department_section_input').data('building_id', building_id);
            $("#Del_Department_Section_Modal").modal("show");
        }
    </script>
</body>

</html>