@php
    $hasCheckbox = array_get($table, 'checkbox_column', false);

@endphp

<tr role="row" class="filter">
    @if ($hasCheckbox)
        <th></th>
    @endif

    @foreach($table['columns'] as $key => $column)
        @php
            $type            = array_get($column, 'filter.type', '');
            $value            = array_get($column, 'filter.value', '');
            $format            = array_get($column, 'filter.date-format', 'dd/mm/yyyy');
            $class            = array_get($column, 'filter.class', '');
            $data            = ['name' => $key, 'column' => $column, 'class' => $class]
        @endphp

        @if (empty($type))
            <th></th>
        @elseif ($type == 'hiddenrow')
            <th class="hidden"></th>
        @elseif (in_array($type, config('metronic-datatable.filter_types')))
            @include('metronic-datatable::filters.' . $type, $data)
        @endif
    @endforeach

    @if (isset($table['actions']) && count($table['actions']) > 0)
        <th class="text-center">
            <button class="btn btn-info btn-filter-cancel">
                {{ __('Reset filter') }}
            </button>
        </th>
    @endif
</tr>
