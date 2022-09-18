<x-app-layout>
    <x-slot name="header" class="sm:flex">
        <div class="ml-3 relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
        </div>
        @if (session()->has('message'))
            <div class="card-body">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
            </div>
        @endif
        <div class="ml-3 relative" align="right">
            <a href="{{ route('contacts.create') }}">
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded my-3 create-button"><i class="fa fa-plus" title="add"></i> Create Contacts</button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Contact No.</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($contacts->isNotEmpty())
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="border px-4 py-2">{{ $contact->contact_id }}</td>
                                <td class="border px-4 py-2">{{ $contact->first_name}} {{ $contact->last_name }}</td>
                                <td class="border px-4 py-2">{{ $contact->contact_no }}</td>
                                <td class="border px-4 py-2">
                                    <div class="sm:flex sm:items-center">
                                        <a href="{{ route('contacts.edit', $contact->contact_id) }}" class="relative">
                                            <button wire:click="edit({{ $contact->id }})" class="btn btn-primary btn-sm edit-button"> <i class="fa fa-pencil" title="Edit"></i> Edit</button>
                                        </a>
                                        <form action="{{ route('contacts.destroy',$contact->contact_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete-button relative"><i class="fa fa-remove" title="Remove"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="11">
                                    <div class="text-center">No data!</div>
                                </th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {!! $contacts->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
