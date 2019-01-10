<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
    <input name="{{!empty($name) ? $name : 'id'}}"
           type="checkbox"
           class="checkbox-item-id checkboxes m-checkable"
           @if(!empty($attr))
               @foreach($attr as $key => $val)
                   {{$key}}="{{$val}}"
               @endforeach
           @endif
           value="{{!empty($value) ? $value : ''}}"/>
    <span></span>
</label>
