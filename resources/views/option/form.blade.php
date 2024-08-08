{!! Form::open([
    'route' => $option->exists ? ['options.update', $option] : 'options.store',
    'method' => $option->exists ? 'PUT' : 'POST',
    'class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4',
]) !!}
@csrf

    @component('components.custom-input', [
        'label' => 'name',
        'name' => 'name',
        'placeholder' => 'Nom de l\'option',
        'value' => old('name', $option->name),
    ])
    @endcomponent  <div class="flex items-center justify-between">
        {!! Form::submit($option->exists ? 'Modifier' : 'Enregistrer', [
            'class' => 'bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded',
        ]) !!}
    </div>
    
    {!! Form::close() !!}