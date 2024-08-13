<div class="bg-white  rounded-lg ">

    @include('components.flash')

    {!! Form::open(['route' => ['frontend.property.contact', $property], 'method' => 'post', 'class' => 'space-y-6']) !!}
    
    <!-- Prénom -->
    <div>
        {!! Form::label('firstname', 'Prénom', ['class' => 'block text-gray-700 font-semibold mb-2']) !!}
        {!! Form::text('firstname', '', [
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre prénom',
        ]) !!}
    </div>
    
    <!-- Nom -->
    <div>
        {!! Form::label('lastname', 'Nom', ['class' => 'block text-gray-700 font-semibold mb-2']) !!}
        {!! Form::text('lastname', '', [
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre nom',
        ]) !!}
    </div>
    
    <!-- Téléphone -->
    <div>
        {!! Form::label('phone', 'Téléphone', ['class' => 'block text-gray-700 font-semibold mb-2']) !!}
        {!! Form::text('phone', '', [
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre téléphone',
        ]) !!}
    </div>
    
    <!-- Email -->
    <div>
        {!! Form::label('email', 'Email', ['class' => 'block text-gray-700 font-semibold mb-2']) !!}
        {!! Form::email('email', null, [
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre email',
        ]) !!}
    </div>
    
    <!-- Message -->
    <div>
        {!! Form::label('message', 'Message', ['class' => 'block text-gray-700 font-semibold mb-2']) !!}
        {!! Form::textarea('message', '', [
            'rows' => 4,
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-500 focus:ring-opacity-50',
            'placeholder' => 'Votre message',
        ]) !!}
    </div>
    
    <!-- reCAPTCHA -->
    <div class="mb-4">
        <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"></div>

    </div>
    
    <!-- Bouton d'envoi -->
    {!! Form::submit('Envoyer', [
        'class' => 'w-full bg-orange-600 text-white font-bold py-3 px-4 rounded-md hover:bg-orange-700 transition duration-300',
    ]) !!}

    {!! Form::close() !!}
</div>
