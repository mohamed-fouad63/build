<?php
include("../middleware/middleware_session.php");
session_login_auth('users');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>المستخدمين</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/images/build.svg" alt="" class="logo" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap5/bootstrap-select.min.css">
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
            <li>
                <div class="btn-group bt_div">
                    <button class="btn" tabindex="0" aria-controls="example" data-bs-toggle="modal"
                        data-placement="right" title="اضافه مستخدم جديد" id="" data-bs-target="#Add_USER_Modal">
                        <label class="btn btn-primary">اضافه مستخدم جديد</label>
                    </button>
                </div>
            </li>
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
                <span class="p-3 badge btn-warning text-dark fs-5">المستخدمين</span>
            </div>
            <!-- [ Main Content ] start -->
            <div id="main">
                <div id="pills-tabContent">
                    <div class="row" id="container_buildings">
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] end -->
        </div>
        <!-- start user exit  modal -->
        <?php include("../component/modals/users/add_user_modal.php") ?>
        <?php include("../component/modals/users/del_user_modal.php") ?>
        <?php include("../component/modals/users/reset_user_modal.php") ?>
        <?php include("../component/modals/users/user_auth_modal.php") ?>
        <?php include("../component/modals/users/edit_user_modal.php") ?>
        <?php include '../component/modals/user_exit.php' ?>
        <!-- end user exit modal -->
        <!-- start user password  modal -->
        <?php include '../component/modals/user_password_change.php' ?>
        <!-- end user password modal -->
        <div class="toast-container" style="position: fixed;bottom: 20px;">
            <div class="toast" id="myToast" data-bs-delay="1000">

                <div class="toast-body">
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="../assets/js/plugins/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/popper.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/bootstrap5/bootstrap-select.min.js"></script>
    <script src="../assets/js/pcoded.min2.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../js/log/change_password.js"></script>
    <script src="../js/tbl_user/add_user.js"></script>
    <script>
        function load_users_tables() {
            var container_buildings = "";

            $.post(
                "../api/tbl_user/users_auth.php",
                { x: "" },
                function (data) {
                    $.each(data, function (key, val) {
                        count_user = key + 1;
                        if (val['build'] == '1') { checked_build = 'checked' } else { checked_build = '' };
                        if (val['dvice_office'] == '1') { checked_dvice_office = 'checked' } else { checked_dvice_office = '' };
                        if (val['add_dvice'] == '1') { checked_add_dvice = 'checked' } else { checked_add_dvice = '' };
                        if (val['edit'] == '1') { checked_edit = 'checked' } else { checked_edit = '' };
                        if (val['all_dvices'] == '1') { checked_all_dvices = 'checked' } else { checked_all_dvices = '' };
                        if (val['move_to'] == '1') { checked_move_to = 'checked' } else { checked_move_to = '' };
                        var building = "";
                        $.each(val['building'], function (key2, val2) {
                            var myStr = val2['floor_name'].toString();
                            var strArray = myStr.split(",");
                            var floors = "";
                            for (var i = 0; i < strArray.length; i++) {
                                floors += "<span class='badge bg-secondary me-2'>" + strArray[i] + " " + "</span>";

                            }
                            building += `
                                <div class="btn-primary mb-2 p-2">
                                    <div>
                                        <span>
                                            ${val2['building_name']}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="floor_name_span">
                                            ${floors}
                                        </span>
                                    </div>
                                </div>
                            `;
                        })
                        container_buildings += `
<div class='col-md-12 col-xl-2 text-center mb-4'>
    <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-info">${count_user}</button>
                        <button type="button" class="btn btn-outline-success"
                                data-edit_user_name = "${val['first_name']}"
                                data-edit_user_id = "${val['id']}"
                                onclick='user_edit_modal(this)' title="">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger"
                                data-del_user_name = "${val['first_name']}"
                                data-del_user_id = "${val['id']}"
                                onclick='user_del_modal(this)' title="حذف المستخدم">
                            <i class="bi bi-trash"></i>
                        </button>
                        <button type="button" class="btn btn-outline-warning"
                                data-reset_user_name = "${val['first_name']}"
                                data-reset_user_id = "${val['id']}"
                                onclick='user_reset_modal(this)' title="استعاده كلمه مرور المستخدم">
                            <i class="bi bi-key-fill"></i>
                        </button>
                    </div> 
        <div class="card-body">
        <i class="bi bi-person-fill me-2 fs-1"></i>
        <h6 class="fs-3">${val['id']}</h6>
        <h5 class="card-title fs-3">${val['first_name']}</h5>
        <input type="hidden" name="user_id" value="${val['id']}">
        <input type="hidden" name="user_id" value="${val['first_name']}">
        <p class="card-text"></p>
        <div>
            <input type="checkbox" class="btn-check" data-user_auth="build" data-user_id="${val['id']}" id="build_auth_${val['id']}" ${checked_build} autocomplete="off" onclick="ch(this)">
            <label class="btn btn-outline-success mt-2" title="المبانى" data-build_auth = ${val['build']} for="build_auth_${val['id']}"><i class="bi bi-building"></i></label>
            
            <input type="checkbox" class="btn-check" data-user_auth="dvice_office" data-user_id="${val['id']}" id="dvice_office_auth_${val['id']}" ${checked_dvice_office} autocomplete="off" onclick="ch(this)">
            <label class="btn btn-outline-success mt-2" title="اجهزه مكتب" for="dvice_office_auth_${val['id']}"><i class="bi bi-pc-display"></i></label>

            <input type="checkbox" class="btn-check" data-user_auth="add_dvice" data-user_id="${val['id']}" id="add_dvice_auth_${val['id']}" ${checked_add_dvice} autocomplete="off" onclick="ch(this)">
            <label class="btn btn-outline-success mt-2" title="اضافه الاجهزه" for="add_dvice_auth_${val['id']}"><i class=" bi bi-plus"></i></label>
            
            <input type="checkbox" class="btn-check" data-user_auth="all_dvices" data-user_id="${val['id']}" id="all_dvice_auth_${val['id']}" ${checked_all_dvices} autocomplete="off" onclick="ch(this)">
            <label class="btn btn-outline-success mt-2" title="سجل الاجهزه" for="all_dvice_auth_${val['id']}"><i class="bi bi-journal-bookmark"></i></label>
            
            <input type="checkbox" class="btn-check" data-user_auth="move_to" data-user_id="${val['id']}" id="move_to${val['id']}" ${checked_move_to} autocomplete="off" onclick="ch(this)">
            <label class="btn btn-outline-success mt-2" title="نقل الاجهزه" for="move_to${val['id']}"><i class="bi bi-journal-bookmark"></i></label>


        </div>
        </div>
        <div class="m-2">
        <button class="btn" id="form_btn" tabindex="0" aria-controls="example"
            title="المبانى المصرح اضافه اجهزه بها"
            data-user_name = "${val['first_name']}"
            data-user_id = "${val['id']}"
            onclick="user_details_modal(this)">
            <label class="btn btn-primary">تعديل</label>
        </button>
        ${building}
        </div>
    </div>
</div>
        `
                    })
                        ;
                    $("#container_buildings").html(container_buildings);
                },
                "json"
            );
        }

        load_users_tables()
    </script>
    <script>
        var options_select_building_name = "<option></option>";
        $.post("../api/building/get_building_names.php",
            { x: '' },
            function (data) {
                $.each(data, function (key, val) {
                    options_select_building_name +=
                        "<option style='direction:ltr' value='" +
                        val.building_id +
                        "'>" +
                        val.building_name +
                        "</option>";
                });
                $("#building_name_select").html(options_select_building_name);
            },
            "json");

        $("#building_name_select").change(function () {


            building_id = $(this).val();
            var options_select_floor_name = "";
            $.post(
                "../api/building/get_building_floors.php",
                { building_id: building_id },
                function (data) {
                    $.each(data, function (key, val) {
                        options_select_floor_name +=
                            "<option style='direction:ltr' value='" +
                            val.floor_id +
                            "'>" +
                            val.floor_name +
                            "</option>";
                    });
                    $("#floor_name_select").html(options_select_floor_name);
                    $('#floor_name_select').selectpicker('destroy');
                    $('#floor_name_select').prop('multiple', true);
                    $('#floor_name_select').data('actions-box', 'true');
                    $('#floor_name_select').selectpicker('deselectAll');
                    $('#floor_name_select').selectpicker();
                    $('#floor_name_select+ button').removeClass("btn btn-light bs-placeholder");
                    $('#floor_name_select+ button').addClass("form-control");
                },
                "json"
            );
        });
    </script>
    <script>
        function user_edit_modal(e) {
            user_name = $(e).data("edit_user_name");
            user_id = $(e).data("edit_user_id");
            $("#user_edit_details").html(`
        <div class="input-group mb-3">
            <span class="input-group-text col-sm-2">الاسم</span>
            <input type="text" class="form-control me-3" id="edit_user_name_input" value="${user_name}" placeholder="اسم المستخدم">
            <span class="input-group-text col-sm-2">رقم الملف</span>
            <input type="number" class="form-control" data-user_num="${user_id}" id="edit_user_id_input" value="${user_id}" placeholder="رقم ملف المستخدم">
        
        `);
            $("#Edit_USER_Modal").modal("show");
        }
    </script>
    <script>
        function user_del_modal(e) {
            user_name1 = $(e).data("del_user_name");
            user_id1 = $(e).data("del_user_id");
            $("#user_del_details").html(`
        <div class="input-group mb-3">
            <span class="input-group-text col-sm-2">الاسم</span>
            <input type="text" class="form-control me-3" value="${user_name1}" placeholder="اسم المستخدم">
            <span class="input-group-text col-sm-2">رقم الملف</span>
            <input type="number" class="form-control" data-user_num_del="${user_id1}" id="del_user_id_input" value="${user_id1}" placeholder="رقم ملف المستخدم">
        
        `);
            $("#Del_USER_Modal").modal("show");
        }
    </script>
    <script>
        function user_reset_modal(e) {
            user_name2 = $(e).data("reset_user_name");
            user_id2 = $(e).data("reset_user_id");
            $("#user_reset_details").html(`
        <div class="input-group mb-3">
            <span class="input-group-text col-sm-2">الاسم</span>
            <input type="text" class="form-control me-3" value="${user_name2}" placeholder="اسم المستخدم">
            <span class="input-group-text col-sm-2">رقم الملف</span>
            <input type="number" class="form-control" data-user_num_reset="${user_id2}" id="reset_user_id_input" value="${user_id2}" placeholder="رقم ملف المستخدم">
        
        `);
            $("#Reset_USER_Modal").modal("show");
        }
    </script>
    <script>
        function user_details_modal(e) {
            user_name = $(e).data("user_name");
            user_id = $(e).data("user_id");
            $("#user_details").html(`
            <span class="input-group-text col-sm-2">الاسم</span>
            <input type="text" class="form-control me-3" id="user_name" value="${user_name}" placeholder="اسم المستخدم" readonly>
            <span class="input-group-text col-sm-2">رقم املف</span>
            <input type="number" class="form-control" id="user_id" value="${user_id}" placeholder="رقم ملف المستخدم" readonly>
        `);
            $("#User_Auth_Modal").modal("show");
        }
    </script>
    <script>
        $("#User_Auth_Modal").on("click", ".btn-success", function () {
            var building_id_select = document.getElementById("building_name_select").selectedOptions[0].value;
            var building_name_select = document.getElementById("building_name_select").selectedOptions[0].text;
            var floor_id_select = [];
            for (var option of document.getElementById('floor_name_select').options) {
                if (option.selected) {
                    floor_id_select.push(option.value);
                }
            }

            if (floor_id_select.length == 0) {
                if (confirm("هل تريد حذف الصلاحيات للمستخدم من " + building_name_select + "")) {
                    floor_id_select.push('clear_floors');
                }
            }
            if (building_id_select == '') {
                alert('اختر احد المبانى')
            } else {

                var formData = {
                    user_name: user_name,
                    user_id: user_id,
                    building_id_select: building_id_select,
                    floor_id_select: floor_id_select,
                };
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "../api/tbl_user/update_user_build.php",
                    data: formData,
                    success: function (result) {
                        result = result.replace(/^\s+|\s+$/gm, "");
                        console.log(result)
                        if (result == "done") {
                            $("#container_buildings").html("");
                            load_users_tables();
                        } else {
                            alert("");
                        }
                    },
                });
            }
        })
    </script>

    <script>
        $("#Edit_USER_Modal").on("click", ".btn-success", function () {
            var edit_user_name = $('#edit_user_name_input').val();
            var edit_user_id = $('#edit_user_id_input').val();
            var user_id = $('#edit_user_id_input').data('user_num');

            if (edit_user_name == '' || edit_user_id == '') {
                alert('يوجد حقول فارغه')
            } else {
                var formData = {
                    edit_user_name: edit_user_name,
                    edit_user_id: edit_user_id,
                    user_id: user_id,
                };

                $.ajax({
                    type: "POST",
                    url: "../api/tbl_user/edit_user_name.php",
                    data: formData,
                    success: function (result) {
                        result = result.replace(/^\s+|\s+$/gm, "");
                        console.log(result)
                        if (result == "done") {
                            $("#Edit_USER_Modal").modal("hide");
                            $("#container_buildings").html("");
                            load_users_tables();
                        } else {
                            alert(result);
                        }
                    },
                });
            }
        })
    </script>
    <script>
        $("#Del_USER_Modal").on("click", ".btn-danger", function () {
            var user_id = $('#del_user_id_input').data('user_num_del');
            var formData = {
                user_id: user_id,
            };
            $.ajax({
                type: "POST",
                url: "../api/tbl_user/del_user_name.php",
                data: formData,
                success: function (result) {
                    result = result.replace(/^\s+|\s+$/gm, "");
                    console.log(result)
                    if (result == "done") {
                        $("#Del_USER_Modal").modal("hide");
                        $("#container_buildings").html("");
                        load_users_tables();
                    } else {
                        alert(result);
                    }
                },
            });
        })
    </script>
    <script>
        $("#Reset_USER_Modal").on("click", ".btn-warning", function () {
            var user_id = $('#reset_user_id_input').data('user_num_reset');
            var formData = {
                user_id: user_id,
            };
            $.ajax({
                type: "POST",
                url: "../api/tbl_user/reset_user_name.php",
                data: formData,
                success: function (result) {
                    result = result.replace(/^\s+|\s+$/gm, "");
                    console.log(result)
                    if (result == "done") {
                        $("#Reset_USER_Modal").modal("hide");
                        alert('تم استعاده كلمه المرور بنفس رقم الملف');
                    } else {
                        alert('تعذر استعاده كلمه المرور لمستخدم');
                    }
                },
            });
        })
    </script>
    <script>
        function ch(e) {
            var formData = {
                user_id: $('#' + e.id + '').data('user_id'),
                user_auth: $('#' + e.id + '').data('user_auth')
            }
            if ($(e).is(':checked')) {
                formData.auth_enable = '1';
            } else {
                formData.auth_enable = '0';
            }
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "../api/tbl_user/update_user_auth.php",
                data: formData,
                success: function (result) {
                    result = result.replace(/^\s+|\s+$/gm, "");
                    console.log(result);
                    if (result == '0') {
                        add_bgcolor = 'bg-danger text-white';
                        del_bgcolor = 'bg-success text-white';
                        toast_body_text = 'تم الغاء الصلاحيه';
                    };
                    if (result == '1') {
                        add_bgcolor = 'bg-success text-white';
                        del_bgcolor = 'bg-danger text-white';
                        toast_body_text = 'تم اضافه الصلاحيه';
                    };

                    $("#myToast").removeClass(del_bgcolor).addClass(add_bgcolor);
                    $("#myToast .toast-header").removeClass(del_bgcolor).addClass(add_bgcolor);
                    $("#myToast .toast-body").text(toast_body_text);
                    $("#myToast").toast("show");
                },
            });
        }
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>