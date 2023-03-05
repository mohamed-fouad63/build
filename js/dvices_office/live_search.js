var options = {
  url: function (phrase) {
    return "../api/office/office_name.php";
  },
  getValue: function (element) {
    return element.office_name;
  },
  template: {
    type: "custom",
    method: function (value, item) {
      return (
        "<b>" +
        item.office_name +
        "</b>" +
        "  <i>( " +
        item.building_name +
        " " +
        item.floor_name +
        " )</i> "
      );
    },
  },
  ajaxSettings: {
    dataType: "json",
    method: "GET",
    data: {
      dataType: "json",
    },
  },
  preparePostData: function (data) {
    data.phrase = $("#input_search").val();
    return data;
  },
  list: {
    maxNumberOfElements: 10,
    onClickEvent: function () {
      var office_id = $("#input_search").getSelectedItemData().id;
      $("#input_search").data("office_id", office_id);
      details_offfice.ajax.reload(function () {
        if (!details_offfice.data().count()) {
          $("#details_offfice_field").css("display", "none");
        } else {
          $("#details_offfice_field").css("display", "block");
          $("#print_dvices").removeClass("disabled");
          $("#print_dvices").attr(
            "href",
            "../../build/grd/?office_name=" + office_name
          );
          $("#add_dvice").removeClass("disabled");
        }
      });
      datatable_ajax_reload();
    },
    onSelectItemEvent: function () {},
  },
};
$("#input_search").easyAutocomplete(options);
