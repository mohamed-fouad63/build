$("#Del_Department_Section_Modal .btn-danger").click(function () {
  var formData = {
    section_name: $("#del_department_section_input").data("section_name"),
    section_id: $("#del_department_section_input").data("section_id"),
    branch_department_id: $("#del_department_section_input").data(
      "branch_department_id"
    ),
    main_department_id: $("#del_department_section_input").data(
      "main_department_id"
    ),
    sector_id: $("#del_department_section_input").data("sector_id"),
    floor_id: $("#del_department_section_input").data("floor_id"),
    building_id: $("#del_department_section_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/del_section_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Del_Department_Section_Modal").modal("hide");
        $("#del_department_section_input").val("");
        $("#del_department_section_error").text("");
        $("#container_sections").html("");
        get_main_branch_departments();
      } else {
        $("#del_department_section_error")
          .text("تعذر حذف القسم")
          .css("color", "red");
      }
    },
  });
});
