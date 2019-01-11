<th class="{{ isset($data['column']['class']) ? $data['column']['class'] : '' }}">
    <select class="filter-select form-control form-filter {{$class}}" name="{{ $name }}">
        <option value="">{{ __('Select') }}</option>

        @foreach(array_get($column, 'filter.data') as $optionValue => $optionText)
            <option value="{{ $optionValue }}">{{ $optionText }}</option>
        @endforeach

    </select>
</th>
