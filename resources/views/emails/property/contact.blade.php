<x-mail::message>
{{-- Titre principal --}}
# Nouvelle demande de contact

{{-- Introduction et lien vers la propriété --}}
Une nouvelle demande de contact a été envoyée pour le bien 
<a href="{{ route('frontend.property.show', ['slug' => $property->slug, 'property' => $property]) }}" style="color: #e67e22; text-decoration: none; font-weight: bold;">
    {{ $property->title }}
</a>

{{-- Détails du contact avec styles ajoutés --}}
<div style="padding: 20px; background-color: #f9f9f9; border-radius: 8px; margin-top: 20px;">
    <p style="font-size: 16px; color: #333;">
        <strong>Prénom :</strong> {{ $data['firstname'] }}
    </p>
    <p style="font-size: 16px; color: #333;">
        <strong>Nom :</strong> {{ $data['lastname'] }}
    </p>
    <p style="font-size: 16px; color: #333;">
        <strong>Téléphone :</strong> {{ $data['phone'] }}
    </p>
    <p style="font-size: 16px; color: #333;">
        <strong>Email :</strong> {{ $data['email'] }}
    </p>
    <p style="font-size: 16px; color: #333;">
        <strong>Message :</strong> {{ $data['message'] }}
    </p>
</div>

{{-- Message de conclusion --}}
<p style="font-size: 14px; color: #999999; margin-top: 20px;">
    Merci de traiter cette demande rapidement.
</p>

</x-mail::message>
