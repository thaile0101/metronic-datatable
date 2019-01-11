@php
    $hasCheckbox = array_get($table, 'checkbox_column', false);
    $action = $hasCheckbox ? count($table['columns']) + 1 : count($table['columns']);
    $orderDefaultColumn = $table['order_default']['column'];
    $orderDefaultSort = $table['order_default']['order'];
    $columnSort = \App\Helpers\Util::getKeyNumberByKeyValue($orderDefaultColumn, $table['columns']);
    $columnSort = $hasCheckbox ? $columnSort + 1 : $columnSort;
    $checkActions = array_get($table, 'actions', null)
@endphp

<div class="m-portlet m-portlet--head-sm" m-portlet="true" id="metroic_portlet_tool">
    @include('metronic-datatable::header', $checkActions)
    <div class="m-portlet__body" m-hidden-height="348">
        <div class="row">
            <div class="col-md-6">
                @include('metronic-datatable::heading.filters')
            </div>
            <div class="col-md-6">
                @include('metronic-datatable::heading.advance-action')
            </div>
            <div class="table-container" style="width: 100%">
                @include('metronic-datatable::datatable')
            </div>
        </div>
    </div>
</div>

@section('script')
    @include('metronic-datatable::scripts.datatable', [
        'columnSort' => $columnSort,
        'hasCheckbox' => $hasCheckbox
    ])
@stop