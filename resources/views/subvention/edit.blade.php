@extends('layouts.app')

@section('title', __('Mettre à jour Subvention'))

@section('header', __('Update Subvention'))

@section('content')
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                   
                    <div class="mt-8 overflow-x-auto">
                        <div class="max-w-xl py-2 align-middle">
                            <form method="POST" action="{{ route('subventions.update', $subvention->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                @include('subvention.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
