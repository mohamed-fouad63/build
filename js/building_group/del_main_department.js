$("#Del_Main_Department_Modal .btn-danger").click(function () {
  var formData = {
    main_department_name: $("#del_main_department_input").data(
      "main_department_name"
    ),
    main_department_id: $("#del_main_department_input").data(
      "main_department_id"
    ),
    sector_id: $("#del_main_department_input").data("sector_id"),
    floor_id: $("#del_main_department_input").data("floor_id"),
    building_id: $("#del_main_department_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/del_main_department_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Del_Main_Department_Modal").modal("hide");
        $("#del_main_department_input").val("");
        $("#del_main_department_error").text("");
        $("#container_sector_main_departmenst").html("");
        get_sector_main_departments();
      } else {
        $("#del_main_department_error")
          .text("تعذر حذف الاداره العامه")
          .css("color", "red");
      }
    },
  });
});
