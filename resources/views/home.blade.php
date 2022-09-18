<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body  class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 sm:block" style="float: right">
                @auth
                    <a href="{{ url('/contacts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>List of Users</h2>
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
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->isNotEmpty())
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $user->id }}</td>
                                            <td class="border px-4 py-2">{{ $user->name }}</td>
                                            <td class="border px-4 py-2">{{ $user->email}}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('home.contacts', $user->id) }}">
                                                    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded my-3 create-button"><i class="fa fa-eye" title="show"></i> View Contacts</button>
                                                </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>