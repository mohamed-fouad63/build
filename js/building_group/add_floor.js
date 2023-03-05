$("#Add_Floor_Modal .btn-primary").click(function () {
  var formData = {
    building_name: post_data.building_name,
    building_id: post_data.building_id,
    floor_name: $("#floor_name").val(),
    floor_id: $("#floor_id").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/add_floor.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Add_Floor_Modal").modal("hide");
        $("#floor_name").val("");
        $("#container_building_floors").html("");
        get_building_floors();
        // load_post_group_tables();
      } else {
        $("#floor_name").val("موجود بالفعل").css("color", "red");
      }
    },
  });
});
