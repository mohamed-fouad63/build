$("#Del_Sector_Modal .btn-danger").click(function () {
  var formData = {
    sector_name: $("#del_sector_input").data("sector_name"),
    sector_id: $("#del_sector_input").data("sector_id"),
    floor_id: $("#del_sector_input").data("floor_id"),
    building_id: $("#del_sector_input").data("building_id"),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/building/del_sector_name.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#Del_Sector_Modal").modal("hide");
        $("#del_sector_input").val("");
        $("#del_sector_error").text("");
        $("#container_floor_sectors").html("");
        get_floor_sectors();
      } else {
        $("#del_sector_error").text("تعذر حذف القطاع").css("color", "red");
      }
    },
  });
});
