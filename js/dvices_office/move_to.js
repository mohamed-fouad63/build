

$("#Move_To_Modal #move_to_btn ").click(function () {
  var formData = {
    office_name_from: office_name,
    office_name_to: $("#office_name_to").find(":selected").val(),
    floor_id_to: $("#office_name_to").find(":selected").data('floor_id'),
    floor_name_to: $("#office_name_to").find(":selected").data('floor_name'),
    building_id_to: $("#office_name_to").find(":selected").data('building_id'),
    building_name_to: $("#office_name_to").find(":selected").data('building_name'),
    office_id_to: $("#office_name_to").find(":selected").data('office_id'),
    move_by: $("#move_by").val(),
    move_note: $("#move_note").val(),
    move_like: $("#move_like").val(),
    move_to_date: $("#move_to_date").val(),
    dvice_num: dvice_num,
  };
  console.log(formData);
  if (
    formData.office_name_to == "" ||
    formData.move_to_date == "" ||
    formData.move_by == ""
  ) {
    alert("يجب تحديد اسم المكتب المنقول اليه و تاريخ و طريقه النقل");
  } else if (formData.office_name_to == formData.office_name_from) {
    alert("لا يجوز نقل الجهاز الى نفس المكتب");
  } else {
    $.ajax({
      type: "POST",
      url: "../api/dvice/move_to.php",
      data: formData,
      beforeSend: function () {
        $("#Move_To_Modal #move_to_btn").html("جارى معالجه البيانات");
      },
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        console.log(result);
        if (result == "done") {
          datatable_ajax_reload();
          $("#Move_To_Modal").modal("hide");
        } else {
          alert("تعذر نقل الجهاز ");
        }
      },
      complete: function () {
        $("#Move_To_Modal #move_to_btn").html("نقل كـ");
      },
    });
  }
});

$("#Move_To_Modal #auth_move_to_btn").click(function () {
  f = $("#move_to_office_name").val();
  t = $("#office_name_to").val();
  p = $("#move_to_dvice_name").val();
  s = $("#move_to_dvice_sn").val();
  d = $("#move_to_date").val();
  $(this).attr(
    "href",
    "auth_move_to.php?f=" +
    f +
    "&t=" +
    t +
    "&p=" +
    p +
    "&s=" +
    s +
    "&d=" +
    d +
    ""
  ); // Set herf value
});

$("#move_like").click(function () {
  if ($(this).val() != "") {
    $("#move_to_btn").removeClass("disabled");
  } else {
    $("#move_to_btn").addClass("disabled");
  }
});
