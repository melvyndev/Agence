@php
    $class = $class ?? null;
    $value = $value ?? collect(); // Assurez-vous que $value est une collection ou un tableau
    $label = $label ?? '';
    $name = $name ?? '';
    $options = $options ?? []; // Définir une valeur par défaut pour $options
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple class="form-control select2">
        @foreach($options as $k => $v)
            <option value="{{ $k }}" @if($value->contains($k)) selected @endif>{{ $v }}</option>
        @endforeach
    </select>

    @if($errors->has($name))
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
