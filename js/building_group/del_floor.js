$("#Del_Floor_Modal .btn-danger").click(function () {
  var formData = {
    floor_id: $("#del_floor_id_input").data("floor_id"),
    floor_name: $("#del_floor_id_input").data("floor_name"),
    building_id: $("#del_floor_id_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/del_floor_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Del_Floor_Modal").modal("hide");
        $("#del_floor_name_input").val("");
        $("#del_floor_name_error").text("اسم الطابق").css("color", "#212529");
        $("#container_building_floors").html("");
        get_building_floors();
        // load_post_group_tables();
      } else {
        $("#del_floor_name_error").text("تعذر حذف الطابق").css("color", "red");
      }
    },
  });
});
