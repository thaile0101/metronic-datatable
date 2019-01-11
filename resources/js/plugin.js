var MetronicDatatablePlugin = function () {

    function showDatepicker () {
        $(".datatable-date-filter, .datatable-datetime-filter").datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: !0,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    }

    function showSelect2 () {
        $(".datatable-select2").select2();
    }

    function PortletTools () {
        var e = new mPortlet("metroic_portlet_tool");
    }

    return {
        init: function init() {
            showDatepicker();
            showSelect2();
            PortletTools();
        }
    }
}();

jQuery(document).ready(function() {
    MetronicDatatablePlugin.init();
});