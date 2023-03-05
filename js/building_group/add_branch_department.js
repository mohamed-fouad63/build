$("#Add_Branch_Department_Modal .btn-primary").click(function () {
  var formData = {
    main_department_name: post_data.main_department_name,
    main_department_id: post_data.main_department_id,
    sector_name: post_data.sector_name,
    sector_id: post_data.sector_id,
    floor_name: post_data.floor_name,
    floor_id: post_data.floor_id,
    building_name: post_data.building_name,
    building_id: post_data.building_id,
    branch_department_name: $("#add_branch_department_input").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/add_branch_department.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Add_Branch_Department_Modal").modal("hide");
        $("#add_branch_department_input").val("");
        $("#add_branch_department_error").text("");
        $("#container_sector_main_departmenst").html("");
        get_main_branch_departments();
        // load_post_group_tables();
      } else {
        $("#add_branch_department_error")
          .text("موجود بالفعل")
          .css("color", "red");
      }
    },
  });
});
