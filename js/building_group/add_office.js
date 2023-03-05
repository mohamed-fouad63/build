$("#Add_Post_Office .btn-primary").click(function () {
  var formData = {
    office_name: $("#office_name").val(),
    post_group: $("#post_group_input_modal").val(),
    groupkey: $("#groupkey").val(),
    money_code: $("#money_code").val(),
    post_code: $("#post_code").val(),
    postal_code: $("#postal_code").val(),
    office_type: $("#add_office_type").val(),
    tel: $("#tel").val(),
    address: $("#address").val(),
  };
  if (formData.office_name == "") {
    $("#office_name").val("");
    $("#office_name").css("border", "1px solid red");
    $("#office_name").attr("placeholder", "اسم الوحده فارغه");
  } else if (formData.office_type == "") {
    $("#add_office_type").css("border", "1px solid red");
  } else {
    $.ajax({
      type: "POST",
      url: "../api/office/add_post_office.php",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("." + formData.groupkey + ".btn-group .delbtn").remove();
          $("#office_name").val("");
          $("select#add_office_type").prop("selectedIndex", 0);
          $("#office_name").css("border", "1px solid var(--bs-teal)");
          $("#office_name").attr("placeholder", "");
          $("#" + formData.groupkey)
            .DataTable()
            .ajax.reload();
        } else {
          $("#office_name").val("");
          $("#office_name").css("border", "1px solid red");
          $("#office_name").attr("placeholder", "موجود بالفعل");
        }
      },
    });
  }
});
