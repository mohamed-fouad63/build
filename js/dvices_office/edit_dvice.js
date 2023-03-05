$("#EditModalPC .btn-success").click(function () {
  var formData = {
    pc_sn: $("#edit_dvice_sn").val(),
    pc_ip: $("#dvice_ip").val(),
    pc_domian_name: $("#pc_domian_name").val(),
    dvice_num: dvice_num,
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/dvice/edit_pc_office.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        datatable_ajax_reload();
        $("#EditModalPC").modal("hide");
      } else {
        alert(result);
      }
    },
  });
});
