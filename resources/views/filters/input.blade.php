<th class="{{ isset($data['column']['class']) ? $data['column']['class'] : '' }}">
    <input type="text" value="{{ isset($value) ? $value : '' }}" class="form-control form-filter input-sm {{$class}}" name="{{ $name}}" />
</th>
