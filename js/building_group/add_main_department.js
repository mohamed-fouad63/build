$("#Add_Main_Department_Modal .btn-primary").click(function () {
  var formData = {
    sector_name: post_data.sector_name,
    sector_id: post_data.sector_id,
    floor_name: post_data.floor_name,
    floor_id: post_data.floor_id,
    building_name: post_data.building_name,
    building_id: post_data.building_id,
    main_departmen_name: $("#add_main_department_input").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/add_main_department.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Add_Main_Department_Modal").modal("hide");
        $("#add_main_department_input").val("");
        $("#add_main_department_error").text("");
        $("#container_sector_main_departmenst").html("");
        get_sector_main_departments();
        // load_post_group_tables();
      } else {
        $("#add_main_department_error")
          .text("موجود بالفعل")
          .css("color", "red");
      }
    },
  });
});
