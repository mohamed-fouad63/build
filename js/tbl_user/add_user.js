$("#Add_USER_Modal .btn-success").click(function () {
  var formData = {
    user_id: $("#user_id").val(),
    user_name: $("#user_name").val(),
    job: $("#job").val(),
  };
  console.log(formData);
  $.ajax({
    type: "POST",
    url: "../api/tbl_user/add_user.php",
    data: formData,
    success: function (result) {
      result = result.replace(/^\s+|\s+$/gm, "");
      console.log(result);
      if (result == "done") {
        $("#container_buildings").html("");
        load_users_tables();
      } else {
        alert(result);
      }
    },
  });
});
