{!! Form::open([
    'route' => $property->exists ? ['properties.update', $property] : 'properties.store',
    'method' => $property->exists ? 'PUT' : 'POST',
    'class' => 'bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4',
    'files' => true // Important pour permettre l'upload de fichiers

]) !!}
@csrf

<div class="flex flex-wrap gap-4 mb-4">

    <div>
        <input type="file" id="image" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50" accept="image/*" onchange="previewImage(event)">

        @if($property->exists && $property->image) 
            <!-- Si une image existe pour la propriété, l'afficher -->
            <img id="preview" src="{{$property->imageUrl()}}" alt="Image Preview" class="mt-4 w-32 h-32 object-cover rounded-md">
        @else
            <!-- Si aucune image n'est disponible, masquer la prévisualisation -->
            <img id="preview" src="#" alt="Image Preview" class="mt-4 hidden w-32 h-32 object-cover rounded-md">
        @endif
    </div>

    @component('components.custom-input', [
        'label' => 'Titre',
        'name' => 'title',
        'placeholder' => 'Titre du bien',
        'value' => old('title', $property->title),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Surface',
        'name' => 'surface',
        'type' => 'number',
        'placeholder' => 'Surface du bien',
        'value' => old('surface', $property->surface),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Prix',
        'name' => 'price',
        'type' => 'number',
        'placeholder' => 'Prix du bien',
        'value' => old('price', $property->price),
    ])
    @endcomponent
</div>

<div class="mb-4">
    @component('components.custom-input', [
        'label' => 'Description',
        'name' => 'description',
        'type' => 'textarea',
        'placeholder' => 'Description du bien',
        'value' => old('description', $property->description),
    ])
    @endcomponent
</div>

<div class="flex flex-wrap gap-4 mb-4">
    @component('components.custom-input', [
        'label' => 'Nombre de pièces',
        'name' => 'rooms',
        'type' => 'number',
        'placeholder' => 'Nombre de pièces',
        'value' => old('rooms', $property->rooms),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Nombre de chambres',
        'name' => 'bedrooms',
        'type' => 'number',
        'placeholder' => 'Nombre de chambres',
        'value' => old('bedrooms', $property->bedrooms),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Étage',
        'name' => 'floor',
        'type' => 'number',
        'placeholder' => 'Étage du bien',
        'value' => old('floor', $property->floor),
    ])
    @endcomponent
</div>

<div class="flex flex-wrap gap-4 mb-4">
    @component('components.custom-input', [
        'label' => 'Ville',
        'name' => 'city',
        'placeholder' => 'Ville du bien',
        'value' => old('city', $property->city),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Adresse',
        'name' => 'address',
        'placeholder' => 'Adresse du bien',
        'value' => old('address', $property->address),
    ])
    @endcomponent

    @component('components.custom-input', [
        'label' => 'Code postal',
        'name' => 'postal_code',
        'placeholder' => 'Code postal du bien',
        'value' => old('postal_code', $property->postal_code),
    ])
    @endcomponent
</div>

<div class="mb-4">
    @component('components.custom-input', [
        'label' => 'Vendu',
        'name' => 'sold',
        'type' => 'checkbox',
        'checked' => $property->sold ? 1 : 0,
    ])
    @endcomponent

</div>

<div>
    @component('components.select', [
        'label' => 'Option', 
        'name' => 'options', 
        'value' => $property->options->pluck('id'), 
        'options' => $allOptions, // Passer les options ici
        'multiple' => true
    ])
    @endcomponent
    </div>



<div class="flex items-center justify-between">
    {!! Form::submit($property->exists ? 'Modifier' : 'Enregistrer', [
        'class' => 'bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded',
    ]) !!}
</div>

{!! Form::close() !!}

<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
    
        reader.onload = function() {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.classList.remove('hidden'); // Rendre l'image visible
        };
    
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>