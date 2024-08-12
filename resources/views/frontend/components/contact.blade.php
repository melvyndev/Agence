<div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold text-orange-600 mb-4">Contactez-nous</h2>

    @include('components.flash')
    {!! Form::open(['route' => ['frontend.property.contact', $property], 'method' => 'post']) !!}

    <div class="mb-4">
        {!! Form::label('firstname', 'Prénom', ['class' => 'block text-gray-700']) !!}
        {!! Form::text('firstname', 'Jean', [
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre nom',
        ]) !!}
    </div>

    <div class="mb-4">
        {!! Form::label('lastname', 'Nom', ['class' => 'block text-gray-700']) !!}
        {!! Form::text('lastname', 'Dupont', [
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre nom',
        ]) !!}
    </div>
    <div class="mb-4">
        {!! Form::label('phone', 'Téléphone', ['class' => 'block text-gray-700']) !!}
        {!! Form::text('phone', '06 12 34 56 78', [
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre nom',
        ]) !!}
    </div>
    <div class="mb-4">
        {!! Form::label('email', 'Email', ['class' => 'block text-gray-700']) !!}
        {!! Form::email('email', null, [
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre email',
        ]) !!}
    </div>

    <div class="mb-4">
        {!! Form::label('message', 'Message', ['class' => 'block text-gray-700']) !!}
        {!! Form::textarea('message', 'message', [
            'rows' => 4,
            'class' =>
                'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre message',
        ]) !!}
    </div>

    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>


    {!! Form::submit('Envoyer', [
        'class' => 'w-full bg-orange-600 text-white font-bold py-2 px-4 rounded-md hover:bg-orange-700',
    ]) !!}

    {!! Form::close() !!}
</div>
