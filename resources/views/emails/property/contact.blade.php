<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été envoyée pour le bien 
<a href="{{ route('frontend.property.show', ['slug' => $property->slug, 'property' => $property]) }}">
    {{ $property->title }}
</a>
<div class="py-4">
    - Prénom : {{ $data['firstname'] }}
    - Nom : {{ $data['lastname'] }}
    - Téléphone : {{ $data['phone'] }}
    - Email : {{ $data['email'] }}
    <br/>
    - Message : {{ $data['message'] }}
</div>

</x-mail::message>
