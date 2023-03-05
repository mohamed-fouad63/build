$("#Del_Branch_Department_Modal .btn-danger").click(function () {
  var formData = {
    branch_department_name: $("#del_branch_department_input").data(
      "branch_department_name"
    ),
    branch_department_id: $("#del_branch_department_input").data(
      "branch_department_id"
    ),
    main_department_id: $("#del_branch_department_input").data(
      "main_department_id"
    ),
    sector_id: $("#del_branch_department_input").data("sector_id"),
    floor_id: $("#del_branch_department_input").data("floor_id"),
    building_id: $("#del_branch_department_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/del_branch_department_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Del_Branch_Department_Modal").modal("hide");
        $("#del_branch_department_input").val("");
        $("#del_branch_department_error").text();
        $("#container_sector_main_departmenst").html("");
        get_main_branch_departments();
      } else {
        $("#del_branch_department_error")
          .text("تعذر حذف الاداره")
          .css("color", "red");
      }
    },
  });
});
