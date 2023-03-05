$("#Add_Sector_Modal .btn-primary").click(function () {
  var formData = {
    floor_name: post_data.floor_name,
    floor_id: post_data.floor_id,
    building_name: post_data.building_name,
    building_id: post_data.building_id,
    sector_name: $("#add_sector_input").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/add_sector.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Add_Sector_Modal").modal("hide");
        $("#add_sector_input").val("");
        $("#add_sector_error").text("");
        $("#container_floor_sectors").html("");
        get_floor_sectors();
        // load_post_group_tables();
      } else {
        $("#add_sector_error").text("موجود بالفعل").css("color", "red");
      }
    },
  });
});
