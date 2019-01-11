<th class="{{ isset($data['column']['class']) ? $data['column']['class'] : '' }}">
    <div class="input-group date">
        <input
            type="text"
            class="form-control m-input datatable-date-filter {{$class}}"
            readonly=""
            placeholder="Select date"
            data-date-format="{{ $format }}"
            onkeydown="return false"
            name="{{ $name }}"
        />
         <div class="input-group-append">
              <span id="clear-date" class="input-group-text">
                   <i class="la la-calendar-check-o"></i>
               </span>
          </div>
     </div>
</th>
