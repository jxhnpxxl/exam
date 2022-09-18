<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body  class="antialiased">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>List of Users for {{ $name }}</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">No.</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($contacts->isNotEmpty())
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $contact->contact_id }}</td>
                                            <td class="border px-4 py-2">{{ $contact->first_name}} {{ $contact->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $contact->contact_no }}</td>
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
                    <div class="">
                        <a href="{{ route('home') }}" class="delete-button">
                            <button class="btn  btn-sm delete-button">Return</button>
                        </a>
                    </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>