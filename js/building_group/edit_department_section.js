$("#Edit_Department_Section_Modal .btn-primary").click(function () {
  var formData = {
    new_department_section_input: $("#edit_department_section_input").val(),
    old_section_name: $("#edit_department_section_input").data(
      "old_section_name"
    ),
    section_id: $("#edit_department_section_input").data("section_id"),
    branch_department_id: $("#edit_department_section_input").data(
      "branch_department_id"
    ),
    main_department_id: $("#edit_department_section_input").data(
      "main_department_id"
    ),
    sector_id: $("#edit_department_section_input").data("sector_id"),
    floor_id: $("#edit_department_section_input").data("floor_id"),
    building_id: $("#edit_department_section_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/edit_Department_Section_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Edit_Department_Section_Modal").modal("hide");
        $("#edit_department_section_input").val("");
        $("#edit_department_section_error").text("");
        $("#container_sections").html("");
        get_main_branch_departments();
      } else {
        $("#edit_department_section_error")
          .text("موجود بالفعل")
          .css("color", "red");
      }
    },
  });
});
