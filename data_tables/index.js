var table = $("#pc_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/build/api/dvice/count_pc.php",
    method: "post",
    data: function (d) {
      d.dvice_id = "pc";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=الجهاز&ip=yes" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد اجهزه مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#status").html(api.column(0).data().sum());
  },
});

var monitor_table = $("#monitor_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/build/api/dvice/count_pc.php",
    method: "post",
    data: function (d) {
      d.dvice_id = "monitor";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=الشاشه&ip=no" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد شاشات مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#monitors_count").html(api.column(0).data().sum());
  },
});

var printer_table = $("#printer_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/build/api/dvice/count_pc.php",
    method: "post",
    data: function (d) {
      d.dvice_id = "printer";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=الطابعه&ip=yes" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد طابعات مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#printers_count").html(api.column(0).data().sum());
  },
});

var pos_table = $("#pos_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/build/api/dvice/count_pc.php",
    method: "post",
    data: function (d) {
      d.dvice_id = "pos";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=الماكينه&ip=yes" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد ماكينات نقاط بيع مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#pos_count").html(api.column(0).data().sum());
  },
});

var barcode_scanner_table = $("#barcode_scanner_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/count_postal.php",
    method: "post",
    data: function (d) {
      d.dvice_type = "قارىء باركود";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=قارئ الباركود&ip=no" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد قوارئ باركود مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#barcode_scanner_count").html(api.column(0).data().sum());
  },
});

var barcode_printer_table = $("#barcode_printer_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/count_postal.php",
    method: "post",
    data: function (d) {
      d.dvice_type = "طابعه باركود";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=طابعه الباركود&ip=no" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد طابعات باركود مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#barcode_printer_count").html(api.column(0).data().sum());
  },
});

var scale_table = $("#scale_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/count_postal.php",
    method: "post",
    data: function (d) {
      d.dvice_type = "ميزان الكتروني";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=الميزان&ip=ىخ" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد موازين اليكترونيه مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#scale_count").html(api.column(0).data().sum());
  },
});

var scale_table = $("#custom_display_table").DataTable({
  bProcessing: true,
  ajax: {
    url: "/it2/api/dvice/count_postal.php",
    method: "post",
    data: function (d) {
      d.dvice_type = "شاشه عرض عملاء";
    },
    dataSrc: "",
  },
  deferRender: true,
  columns: [
    { data: "COUNT(dvice_name)" },
    {
      data: "dvice_name",
      className: "px-3 text-end",
      render: function (data, type, row, meta) {
        return `<a href="../api/dvice/count_dvice.php?dvice_name=${data}&dvice_type=شاشه العميل&ip=no" target="_blank" class="text-decoration-none" style="color:unset">${data}</a>`;
      },
    },
  ],
  // select: {style: 'multi'},
  paging: false,
  dom: "rt",
  order: [[0, "desc"]],
  autoWidth: false,

  language: {
    emptyTable: "لا يوجد شاشات عرض عملاء مدرجه",
  },
  drawCallback: function () {},
  initComplete: function () {
    $.fn.dataTable.Api.register("sum()", function () {
      return this.flatten().reduce(function (a, b) {
        if (typeof a === "string") {
          a = a.replace(/[^\d.-]/g, "") * 1;
        }
        if (typeof b === "string") {
          b = b.replace(/[^\d.-]/g, "") * 1;
        }
        return a + b;
      }, 0);
    });
    var api = this.api();
    $("#custom_display_table_count").html(api.column(0).data().sum());
  },
});
