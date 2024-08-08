@php
    $class ??= null;
    $value = $value ?? collect(); 
    $label = $label ?? '';
    $name = $name ?? '';
    $options = $options ?? []; // Définit une valeur par défaut pour $options
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple="multiple" class="form-control select2">
        @foreach($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v->name }}</option>
        @endforeach
    </select>

    @if($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
