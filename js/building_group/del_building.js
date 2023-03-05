$("#Del_Building_Group .btn-danger").click(function () {
  building_name = $("#del_building_group_input").val();
  building_id = $("#del_building_group_input").data("del_building_group_id");
  $.ajax({
    type: "POST",
    url: "../api/building/del_building_name.php",
    data: { building_name: building_name, building_id: building_id },
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#del_Building_Group").modal("hide");
        $("#del_building_group_error").text("");
        $("#container_buildings").html("");
        get_building_names();
        // load_post_group_tables();
      } else {
        $("#del_building_group_error").text("تعذر حذف المبنى");
      }
    },
  });
});
