$("#Edit_Building_Group .btn-primary").click(function () {
  building_name = $("#edit_building_group_input").val();
  building_id = $("#edit_building_group_input").data("edit_building_group_id");
  console.log(building_name);
  console.log(building_id);
  $.ajax({
    type: "POST",
    url: "../api/building/edit_building_name.php",
    data: { building_name: building_name, building_id: building_id },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#Edit_Building_Group").modal("hide");
        $("#edit_building_group_error").text("");
        $("#container_buildings").html("");
        get_building_names();
        // load_post_group_tables();
      } else {
        $("#edit_building_group_error").text("موجود بالفعل");
      }
    },
  });
});
