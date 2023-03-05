$("#Edit_Main_Department_Modal .btn-primary").click(function () {
  var formData = {
    new_main_department_name: $("#edit_main_department_input").val(),
    old_main_department_name: $("#edit_main_department_input").data(
      "old_main_department_name"
    ),
    main_department_id: $("#edit_main_department_input").data(
      "main_department_id"
    ),
    sector_id: $("#edit_main_department_input").data("sector_id"),
    floor_id: $("#edit_main_department_input").data("floor_id"),
    building_id: $("#edit_main_department_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/edit_main_department_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Edit_Main_Department_Modal").modal("hide");
        $("#edit_main_department_input").val("");
        $("#container_sector_main_departmenst").html("");
        get_sector_main_departments();
      } else {
        $("#edit_main_department_error")
          .text("موجود بالفعل")
          .css("color", "red");
      }
    },
  });
});
