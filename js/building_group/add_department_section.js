$("#Add_Department_Section_Modal .btn-primary").click(function () {
  var formData = {
    main_department_name: post_data.main_department_name,
    main_department_id: post_data.main_department_id,
    sector_name: post_data.sector_name,
    sector_id: post_data.sector_id,
    floor_name: post_data.floor_name,
    floor_id: post_data.floor_id,
    building_name: post_data.building_name,
    building_id: post_data.building_id,
    branch_department_id: post_data.branch_department_id,
    branch_department_name: post_data.branch_department_name,
    department_section_name: $("#add_department_section_input").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/add_department_section.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Add_Department_Section_Modal").modal("hide");
        $("#add_department_section_input").val("");
        $("#add_department_section_error").text("");
        $("#container_sections").html("");
        get_main_branch_departments();
        // load_post_group_tables();
      } else {
        $("#add_department_section_error")
          .text("موجود بالفعل")
          .css("color", "red");
      }
    },
  });
});
