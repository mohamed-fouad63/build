$("#Edit_Sector_Modal .btn-primary").click(function () {
  var formData = {
    new_sector_name: $("#edit_sector_input").val(),
    old_sector_name: $("#edit_sector_input").data("old_sector_name"),
    sector_id: $("#edit_sector_input").data("sector_id"),
    floor_id: $("#edit_sector_input").data("floor_id"),
    building_id: $("#edit_sector_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/edit_sector_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Edit_Sector_Modal").modal("hide");
        $("#edit_sector_input").val("");
        $("#edit_sector_error").text("");
        $("#container_floor_sectors").html("");
        get_floor_sectors();
      } else {
        $("#edit_sector_error").text("موجود بالفعل").css("color", "red");
      }
    },
  });
});
