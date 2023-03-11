var table = $("#dvice_type_report").DataTable({
    bProcessing: true,
    ajax: {
      url: "/build/api/dvice/dvice_type_report.php",
      method: "get",
      data: function (d) {
        d.b = b;
        d.id= id;
      },
      dataSrc: "",
    },
    deferRender: true,
    columns: [
      { data: "office_name" },
      { data: "dvice_type" },
      { data: "dvice_name" },
      { data: "sn" },
      { data: "ip" },
      { data: "floor_name" },
      { data: "building_name" },
    ],
    // select: {style: 'multi'},
    autoWidth: false,
    paging: false,
    dom: "Brtf",
    buttons: [
      {
        extend: "excel",
        text: '<i class="btn btn-success  bi bi-file-earmark-x" title="تصدير الى اكسل"></i>',
      },
    ],
    language: {
      zeroRecords: "",
      infoEmpty: "0 / ",
      info: "_TOTAL_ / ",
      emptyTable: " ",
    },
    initComplete: function () {
      $(".bt_div").append($(".dt-buttons button")).children().addClass("btn");
      $(".filte_div")
        .append($(".dataTables_filter input"))
        .children()
        .addClass("form-control")
        .attr("placeholder", "بحث عام");
    },
  });
  