@if(session('success'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
{{session('success')}}
</div>   

@endif
@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error) 
            <li>{{$error}}</li>
        @endforeach 

    </ul>
</div>   
@endif
@if ($errors->has('g-recaptcha-response'))
    <div class="alert alert-danger">
        {{ $errors->first('g-recaptcha-response') }}
    </div>
@endif
