<tr role="row" class="heading">
    @if ( array_get($table, 'checkbox_column', false) )
        <th class="heading-columns heading-columns-checkbox sorting_disabled"
            width="2%"
            data-col-name="checkbox"
            data-col-orderable=""
            data-html="">
            <label class="fomo-checkbox m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                <input type="checkbox" name="select_all" class="m-checkable m-group-checkable" />
                <span></span>
            </label>
        </th>
    @endif

    {{--Render columns--}}
    @foreach($table['columns'] as $key => $column)
        <th class="heading-columns {{ array_get($column, 'class', '') }}"
            width="{{ array_get($column, 'width', '') }}"
            data-col-orderable="{{ array_get($column, 'orderable', false) }}"
            data-col-class="{{ array_get($column, 'class', '') }}"
            data-html="{{ array_get($column, 'html', '') }}">
            {{ __($column['text']) }}
        </th>
    @endforeach

    {{--Render "Actions" column--}}
    @if ( isset($table['actions']) && count($table['actions']) > 0 )
        <th class="table-actions text-center">
            {{ __('Actions') }}
        </th>
    @endif
</tr>