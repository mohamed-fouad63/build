$("#Edit_Post_Office .btn-primary").click(function () {
  var formData = {
    // office_name: $('#edit_office_name').val(),
    post_group: $("#post_group_input_edit option:selected").text(),
    groupkey1: $("#groupkeyedit1").val(),
    groupkey2: $("#groupkeyedit2").val(),
    money_code: $("#edit_money_code").val(),
    post_code: $("#edit_post_code").val(),
    postal_code: $("#edit_postal_code").val(),
    office_type: $("#edit_office_type").val(),
    tel: $("#edit_tel").val(),
    address: $("#edit_address").val(),
    office_id: office_id,
  };

  $.ajax({
    type: "POST",
    url: "../api/office/edit_post_office.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        input_search = formData.post_group;
        $("#" + formData.groupkey1)
          .DataTable()
          .ajax.reload();
        $("#" + formData.groupkey2)
          .DataTable()
          .ajax.reload();
        $("." + formData.groupkey2 + ".btn-group .delbtn").remove();
      } else {
        alert("تعذر تحديث الوحده البريديه");
      }
    },
  });
});
