var options_office_name;
$.getJSON("../api/office/office_name.php", function (data) {
  $.each(data, function (key, val) {
    options_office_name +=
      "<option value='" +
      val.office_name +
      "'>" +
      val.office_name +
      "</option>";
  });
  $("#select_office_name").append(options_office_name);
});
var table = $("#example").DataTable({
  bProcessing: true,
  // stateSave: true,
  ajax: {
    url: "/it2/api/misin_it/my_mission.php",
    method: "post",
    data: {
      getid2: function () {
        var getid = Settings.it_id;
        return getid;
      },
      getmy: function () {
        var getmy = $("#month_missin").val();
        return getmy;
      },
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "it_name" },
    { data: "misin_day" },
    { data: "misin_date" },
    { data: "office_name" },
    { data: "misin_type" },
    { data: "start_time" },
    { data: "end_time" },
    { data: "does" },
  ],
  rowCallback: function (row, data) {
    if (data.mission_table == "misin_it_online") {
      $(row).css("color", "blue");
    }
    if (data.mission_table == "misin_it") {
      $(row).css("color", "black");
    }
    if (data.mission_table == "not") {
      $(row).css("color", "red");
    }
  },
  order: [[2, "asc"]],
  ordering: false,
  dom: "Brti",
  paging: false,
  buttons: [
    {
      extend: "print",
      text: '<i class="btn btn-warning bi bi-printer" title="طباعه هذا الشهر"></i>',
      title: "",
      messageTop: function () {
        return (
          "خطه /  " +
          $("#select_it_name option:selected").text() +
          " عن شهر " +
          $("#month_missin").val()
        );
      },
      autoPrint: true,
      exportOptions: { columns: [1, 2, 3, 4, 5, 6] },
    },
  ],
  language: {
    zeroRecords: "اختر القائم بالماموريه و حدد الشهر و السنه",
    infoEmpty: "0",
    info: "_TOTAL_",
  },
  initComplete: function () {
    $(".bt_div")
      .append($(".dt-buttons button"))
      .children()
      .addClass("btn disabled");
    $(".info_div")
      .append($(".dataTables_info"))
      .children()
      .addClass("form-control");
    $(".add_div").append(
      '<a class="btn"  title="اضافه  ماموريه" id="mission_add_btn" href="misin_form.php" target="_blank"><i class="btn btn-primary bi bi-plus"></i></a>'
    );
    // $('.lock_mission').append('<button class="btn disabled" data-bs-toggle="modal" data-placement="right" title="اغلاق هذا الشهر" data-bs-target="#"><i class="btn btn-danger bi bi-lock-fill"></i></button>');
  },
});
$("#month_missin,#select_it_name").on("change", function () {
  table.ajax.reload();
});
