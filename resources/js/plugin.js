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
    };

    return {
        init: function init() {
            showDatepicker();
        }
    }
}();

jQuery(document).ready(function() {
    MetronicDatatablePlugin.init();
});