$("#Resen_To_It_Modal .btn-success").click(function () {
  var formData = {
    date_from_auth_repair: $("#date_from_auth_repair").val(),
    by_from_auth_repair: $("#by_from_auth_repair").val(),
    dvice_num: dvice_num,
  };
  console.log(formData);
  if (
    formData.date_from_auth_repair != "" &&
    formData.by_from_auth_repair != ""
  ) {
    $.ajax({
      type: "POST",
      url: "../api/dvice/resend_to_it.php",
      data: formData,
      success: function (result) {
        result = result.replace(/^\s+|\s+$/gm, "");
        if (result == "done") {
          $("#Resen_To_It_Modal").modal("hide");
          datatable_ajax_reload();
        } else {
          alert(result);
        }
      },
    });
  } else {
    alert("يجب تحديد تاريخ و طريقه عوده الجهاز للدعم الفنى");
  }
});
