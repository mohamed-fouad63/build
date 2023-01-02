var table = $("#example").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/replace_pices_dvice.php",
    method: "post",
    data: function (d) {
      d.auth = "";
    },
    dataSrc: "",
  },
  columns: [
    { data: "date" },
    { data: "office_name" },
    { data: "dvice_name" },
    { data: "sn" },
    { data: "id" },
    { data: "replace_type" },
  ],
  order: [[0, "desc"]],
  paging: false,
  dom: "Bfrtip",
  buttons: [
    {
      extend: "excel",
      text: '<i class="btn btn-success  bi bi-file-earmark-x" title="تصدير الى اكسل"></i>',
    },
    {
      extend: "copy",
      text: '<i class="btn btn-primary bi bi-clipboard-check" title="نسخ"></i>',
    },
    {
      extend: "print",
      text: '<i class="btn btn-warning bi bi-printer" title="طباعه"></i>',
    },
  ],
  language: {
    zeroRecords: "لا توجد اجهزه تم تغيير مكوناتها",
    infoEmpty: "0 / ",
    info: "_TOTAL_",
  },
  initComplete: function () {
    $("thead tr#filterboxrow th").each(function () {
      $(this).html(
        '<input type="search" id="input' +
          $(this).index() +
          '" placeholder="بحث بـ ' +
          $(this).text() +
          '"/>'
      );
      $(this).on("keyup change", function () {
        var val = $("#input" + $(this).index()).val();
        table.column($(this).index()).search(val).draw();
      });
    });
    $(".filte_div")
      .append($(".dataTables_filter input"))
      .children()
      .addClass("form-control")
      .attr("placeholder", "بحث عام");
    $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
    $(".info_div")
      .append($(".dataTables_info"))
      .children()
      .addClass("form-control");
    $("thead tr#filterboxrow").css("display", "table-row");
    $("thead tr#filterboxrow th input").addClass("form-control");
    $("table").removeClass("dataTable");
    $("table tbody").addClass("table-success");
  },
});
