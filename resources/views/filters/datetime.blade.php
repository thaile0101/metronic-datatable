<th class="{{ isset($data['column']['class']) ? $data['column']['class'] : '' }}">
    <div class="input-group date">
        <input type="text"
               class="form-control form-filter input-sm datatable-datetime-filter {{$class}}"
               data-date-format="{{ $format }}"
               onkeydown="return false"
               name="{{ $name }}">

        <span class="input-group-btn">
            <button class="btn btn-metal btn-clear-date-filter" type="button">
                <i class="fa fa-times"></i>
            </button>
        </span>
    </div>
</th>
