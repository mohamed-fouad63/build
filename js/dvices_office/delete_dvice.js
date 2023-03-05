$("#DeleteModalPC .btn-danger").click(function () {
  var formData = {
    dvice_num: dvice_num,
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/dvice/delete_pc_office.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      if (result == "done") {
        datatable_ajax_reload();
        $("#DeleteModalPC").modal("hide");
      } else {
        alert("لم يتم الحذف");
      }
    },
  });
});
