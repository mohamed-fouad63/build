var options_select_id_dvice_type = "<option></option>";
$.getJSON("../api/dvice/id_dvice_type.php", function (data) {
  $.each(data, function (key, val) {
    options_select_id_dvice_type +=
      "<option style='direction:ltr' value='" +
      val.id +
      "'>" +
      val.id +
      "</option>";
  });
  $("#id_dvice_type").html(options_select_id_dvice_type);
  if ($("#id_dvice_type").val() == "") {
    $("#divce_type").val("");
    $("#code_inventory").val("");
  }
});

$("#id_dvice_type").change(function () {
  id_dvice_type = $(this).val();
  var options_select_dvice_name = "<option></option>";
  $.getJSON(
    "../api/dvice/dvice_name_dvice_type.php?id_dvice_type=" +
      id_dvice_type +
      "",
    function (data) {
      $.each(data, function (key, val) {
        options_select_dvice_name +=
          "<option style='direction:ltr' value='" +
          val.dvice_name_new +
          "'>" +
          val.dvice_name_new +
          "</option>";
      });
      $("#select_dvice_name").html(options_select_dvice_name);
      if ($("#id_dvice_type").val() == "") {
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#add_dvice_btn").addClass("disabled");
      }
    }
  );
});

$("#select_dvice_name").change(function () {
  select_dvice_name = $(this).val();
  $.getJSON(
    "../api/dvice/dvice_type_dvice_type.php?dvice_name=" +
      select_dvice_name +
      "",
    function (data) {
      $.each(data, function (key, val) {
        $("#divce_type").val(val.dvice_type);
        $("#code_inventory").val(val.code_inventory);
      });
      $("#add_dvice_btn").removeClass("disabled");
      if ($("#select_dvice_name").val() == "") {
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#add_dvice_btn").addClass("disabled");
      }
    }
  );
});

$("#add_dvice_btn").click(function () {
  var formData = {
    office_name: office_name,
    building_name: building_name,
    building_id: building_id,
    floor_name: floor_name,
    floor_id: floor_id,
    office_id: office_id,
    dvice_name: $("#select_dvice_name").val(),
    dvice_sn: $("#divce_sn_add").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/dvice/add_dvice_office.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#id_dvice_type option").eq(0).prop("selected", true);
        $("#select_dvice_name option").eq(0).prop("selected", true);
        $("#divce_type").val("");
        $("#code_inventory").val("");
        $("#divce_sn_add").val("");
        $("#add_dvice_btn").addClass("disabled");
        datatable_ajax_reload();
      } else {
        alert(result);
        $("#Add_dvice_Modal").modal("show");
      }
    },
  });
});
