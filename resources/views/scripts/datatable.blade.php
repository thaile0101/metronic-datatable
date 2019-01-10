@section('style')
    <link href="/admin/metronic-datatable/global/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@stop

<script src="/admin/metronic-datatable/global/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/admin/metronic-datatable/thaile.metronic.datatable.js" type="text/javascript"></script>
<script type="application/javascript">
    var transMetronicDatatable  = {!! json_encode(trans('metronic-datatable::metronic-datatable')) !!};
    var tableItem = null;
    var onlyTrash = false;

    var DatatableRun = {
        init: function () {
            var page = 1;
            tableItem = $("#itemTable").DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "lengthChange": true,
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "order": [[{{$columnSort}}, "desc"]],
                "preDrawCallback" : function (e) {
                    var length = e._iDisplayLength;
                    var start = e._iDisplayStart;
                    page = (start / length) + 1;
                },
                "ajax": {
                    'type': "POST",
                    'url': "{{route($table['ajax']['src'])}}",
                    beforeSend : function() {
                        mApp.block("body", {});
                    },
                    "data": function (d) {
                            d.page = page
                            d.only_trashed = onlyTrash
                            @foreach($table['columns'] as $k => $column)
                                @if($column['orderable'])
                                    @if(array_key_exists('filter', $column) && $column['filter']['type'] == 'input')
                                        d.{{$k}} = $('input[name={{$k}}]').val()
                                    @endif
                                    @if (array_key_exists('filter', $column) && $column['filter']['type'] == 'select')
                                        d.{{$k}} = $('select[name={{$k}}]').val()
                                    @endif
                                @endif
                            @endforeach
                    },
                    complete: function () {
                        mApp.unblock("body");
                    },
                },
                "columns": [
                    @if($hasCheckbox)
                        {"data": "checkbox"},
                    @endif
                    @foreach($table['columns'] as $k => $column)
                        {"data": "{{$k}}"},
                    @endforeach
                        {"data": "action"}
                ],
                "columnDefs": [
                    {
                        "targets": [ @if($hasCheckbox) 0, @endif {{$action}} ],
                        "orderable": false
                    }
                ],
                "language": {
                    "lengthMenu": "{{ __('metronic-datatable::metronic-datatable.lengthMenu') }}",
                    "zeroRecords": "{{ __('metronic-datatable::metronic-datatable.zeroRecords') }}",
                    "info": "{{ __('metronic-datatable::metronic-datatable.info') }}",
                    "infoEmpty": "{{ __('metronic-datatable::metronic-datatable.infoEmpty') }}",
                    "search": "{{ __('metronic-datatable::metronic-datatable.search') }}",
                    "paginate": {
                        "first":      "{{ __('metronic-datatable::metronic-datatable.first') }}",
                        "last":       "{{ __('metronic-datatable::metronic-datatable.last') }}",
                        "next":       "{{ __('metronic-datatable::metronic-datatable.next') }}",
                        "previous":   "{{ __('metronic-datatable::metronic-datatable.previous') }}"
                    },
                    "infoFiltered": "({{ __('metronic-datatable::metronic-datatable.infoFiltered') }})"
                }
            });

            @foreach($table['columns'] as $k => $column)
                @if($column['orderable'])
                    @if(array_key_exists('filter', $column) && $column['filter']['type'] != 'input')
                        $('input[name={{$k}}]').on( 'keyup', function (e) {
                            if (e.which == 13) {
                                tableItem.search( this.value ).draw();
                            }
                        });
                    @endif
                    @if (array_key_exists('filter', $column) && $column['filter']['type'] != 'select')
                        $('input[name={{$k}}]').on( 'change', function (e) {
                            tableItem.search( this.value ).draw();
                        });
                    @endif
                    @if (array_key_exists('filter', $column) && $column['filter']['type'] == 'select')
                        $('select[name={{$k}}]').off().on( 'change', function (e) {
                            tableItem.search( this.value ).draw();
                        });
                    @endif
                @endif
            @endforeach

            @if($hasCheckbox)
                    tableItem.on("change", ".m-group-checkable", function() {
                        var e = $(this).closest("table").find("td:first-child .m-checkable"),
                            a = $(this).is(":checked");
                        $(e).each(function() {
                            a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
                        })
                    });
                    tableItem.on("change", "tbody tr .m-checkbox", function() {
                        $(this).parents("tr").toggleClass("active")
                    });
            @endif
        }
    }

    jQuery(document).ready(function() {
        DatatableRun.init();
    });

</script>