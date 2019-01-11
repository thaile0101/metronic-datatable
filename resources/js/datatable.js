var MetronicDatatable = function () {
    const iptBulkAction = $('#ipt_bulk_action');
    const btnAdvance = $(".btn-advance:first-child");
    const btnOnlyTrash = $('#datatable-btn-trashed');
    const btnDataAll = $('#datatable-btn-all');

    var selectedAdvanceAction = function () {
        $(".m-dropdown__wrapper li a").click(function(){
            btnAdvance.text($(this).text());
            btnAdvance.val($(this).text());
            iptBulkAction.attr('data-value',  $(this).data('value'));
            iptBulkAction.attr('data-ajax-url',  $(this).data('ajax-url'));
            iptBulkAction.attr('data-method',  $(this).data('method'));
            iptBulkAction.attr('data-event', $(this).data('event'));
        });
    };

    function confirmApplyAdvanceAction () {
        $('.table-group-action-submit').off().on('click', function () {
            swal({
                title: transMetronicDatatable.confirm_apply_advance_title,
                text: transMetronicDatatable.confirm_apply_advance_text,
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: transMetronicDatatable.confirm_apply_advance_yes,
                cancelButtonText: transMetronicDatatable.confirm_apply_advance_no,
                reverseButtons: !0
            }).then((result) => {
                if (result.value) {
                    handleAdvanceAction();
                    return true;
                }
            })
        });
    }

    function handleAdvanceAction () {
        let ids = $('tbody tr input.checkbox-item-id:checked').serialize();
        let url = iptBulkAction.attr('data-ajax-url');
        let method = iptBulkAction.attr('data-method');
        if (!ids) {
            toastr.error(transMetronicDatatable.please_choose_checkbox);
            return false;
        }
        if (!url || typeof url === "undefined" || !method || typeof method === "undefined") {
            toastr.error(transMetronicDatatable.please_choose_action);
            return false;
        }

        $.ajax(
            {
                type: method,
                url: url,
                dataType: "json",
                async: false,
                beforeSend: function () {
                    mApp.block("body", {});
                },
                data: {ids: ids},
                success: function (data) {
                    if (data.code === 200) {
                        toastr.success(transMetronicDatatable.action_success);
                    }else {
                        toastr.error(transMetronicDatatable.action_failed);
                    }
                    tableItem.draw();
                    mApp.unblock("body");
                },
                complete: function () {
                    mApp.unblock("body");
                },
                error: function(xhr, textStatus, errorThrown)
                {
                    mApp.unblock("body");
                }
            });
    }

    function confirmDestroyItem() {
        $('#itemTable tbody').on('click','button', function() {
            swal({
                title: transMetronicDatatable.confirm_destroy_item_title,
                text: transMetronicDatatable.confirm_destroy_item_text,
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: transMetronicDatatable.confirm_destroy_item_yes,
                cancelButtonText: transMetronicDatatable.confirm_destroy_item_no,
                reverseButtons: !0
            }).then((result) => {
                if (result.value) {
                    $('#frm-destroy' + $(this).data('id')).submit();
                }
            })
        });
    }

    function confirmDeleteItem() {
        $('#itemTable tbody').on('click', '.datatable-delete', function () {
            let _that = $(this);
            swal({
                title: transMetronicDatatable.confirm_delete_item_title,
                text: transMetronicDatatable.confirm_delete_item_text,
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: transMetronicDatatable.confirm_delete_item_yes,
                cancelButtonText: transMetronicDatatable.confirm_delete_item_no,
                reverseButtons: !0
            }).then(function (result) {
                if (result.value) {
                    window.location.href = _that.data('url');
                }
            });
        });
    }

    function confirmRestoreItem() {
        $('#itemTable tbody').on('click', '.datatable-restore', function () {
            let that = $(this);
            swal({
                title: transMetronicDatatable.confirm_restore_item_title,
                text: transMetronicDatatable.confirm_restore_item_text,
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: transMetronicDatatable.confirm_restore_item_yes,
                cancelButtonText: transMetronicDatatable.confirm_restore_item_no,
                reverseButtons: !0
            }).then(function (result) {
                if (result.value) {
                    window.location.href = that.data('url');
                }
            });
        });
    }

    function resetFilterDatatable() {
        $('.btn-filter-cancel').on('click', function () {
            $('thead tr input').val('');
            $('thead tr select').val('');
            tableItem.draw();
        });
    }

    function handleTrashAction() {
        if (btnOnlyTrash.length){
            btnOnlyTrash.off().on('click', (function () {
                onlyTrash = true;
                tableItem.search( onlyTrash ).draw();
                $('.action-filter').removeClass('active');
                $(this).addClass('active');
            }))
        }
        if (btnDataAll.length){
            btnDataAll.off().on('click', (function () {
                onlyTrash = false;
                tableItem.search( onlyTrash ).draw();
                $('.action-filter').removeClass('active');
                $(this).addClass('active');
            }))
        }
    }

    return {
        init: function init() {
            selectedAdvanceAction();
            handleTrashAction();
            resetFilterDatatable();
            confirmDeleteItem();
            confirmDestroyItem();
            confirmRestoreItem();
            confirmApplyAdvanceAction();
        }
    }
}();

jQuery(document).ready(function() {
    MetronicDatatable.init();
});

var MetronicDatatablePlugin = function () {

    var showDatepicker = function () {
        $(".datatable-date-filter, .datatable-datetime-filter").datepicker({
            todayHighlight: !0,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    };

    var showSelect2 = function () {
        $(".select2").select2();
    };

    return {
        init: function init() {
            showDatepicker();
            showSelect2();
        }
    }
}();

jQuery(document).ready(function() {
    MetronicDatatablePlugin.init();
});