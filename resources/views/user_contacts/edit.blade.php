<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                    
            <form method="POST" action="{{ route('contacts.update', $contact->contact_id) }}">
                @csrf
                @method('PUT')

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $contact->first_name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $contact->last_name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact Number:</strong>
                        <input name="contact_no" type="number" step="1" pattern="^[-/d]/d*$" maxlength="11" class="form-control" placeholder="Contact Number" value="{{ $contact->contact_no }}">
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a href="{{ route('contacts.index') }}">
                        <button class="btn btn-primary btn-sm edit-button">Return</button>
                    </a>
                    <button wire:click.prevent="store()" class="btn btn-success create-button">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>