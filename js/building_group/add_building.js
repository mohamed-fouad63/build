$("#building_Group .btn-primary").click(function () {
  building_name = $("#building_group_input").val();
  console.log(building_name);
  $.ajax({
    type: "POST",
    url: "../api/building/add_building_name.php",
    data: { building_name: building_name },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        $("#building_Group").modal("hide");
        $("#building_group_error").text("");
        $("#container_buildings").html("");
        get_building_names();
        // load_post_group_tables();
      } else {
        $("#building_group_error").text("موجود بالفعل");
      }
    },
  });
});
