<!-- resources/views/components/custom-input.blade.php -->

@php
    $label ??= '';
    $type ??= 'text';
    $class ??= 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline';
    $name ??= '';
    $placeholder ??= '';
    $value ??= null;
    $labelClass ??= 'block text-gray-700 text-sm font-bold mb-2';
    $groupClass ??= 'mb-4';
    $feedbackClass ??= 'text-red-500 text-sm mt-1';
    $errors = $errors ?? session('errors', new \Illuminate\Support\MessageBag);
@endphp

<div class="{{ $groupClass }}">
    @if($label)
        {!! Form::label($name, $label, ['class' => $labelClass]) !!}
    @endif
    @if($type === 'textarea')
        {!! Form::textarea($name, $value, ['class' => $class, 'placeholder' => $placeholder]) !!}
    @elseif($type === 'checkbox')


    {!! Form::checkbox($name, 1, $checked) !!} 

    @else

        {!! Form::{$type}($name, $value, ['class' => $class, 'placeholder' => $placeholder]) !!}
    @endif
    @if ($errors->has($name))
        <span class="{{ $feedbackClass }}">{{ $errors->first($name) }}</span>
    @endif
</div>
