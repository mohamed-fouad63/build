$("#Edit_Floor_Modal .btn-primary").click(function () {
  var formData = {
    new_floor_name: $("#edit_floor_name_input").val(),
    new_floor_id: $("#edit_floor_id_input").val(),

    old_floor_id: $("#edit_floor_id_input").data("old_floor_id"),
    old_floor_name: $("#edit_floor_id_input").data("old_floor_name"),

    floor_index_id: $("#edit_floor_id_input").data("index_id"),
    building_id: $("#edit_floor_id_input").data("building_id"),
  };
  $.ajax({
    type: "POST",
    url: "../api/building/edit_floor_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Edit_Floor_Modal").modal("hide");
        $("#edit_floor_name_input").val("");
        $("#container_building_floors").html("");
        get_building_floors();
        // load_post_group_tables();
      } else {
        $("#edit_floor_name_input").val("موجود بالفعل").css("color", "red");
      }
    },
  });
});
