<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased">

                <h1>  <*  &nbsp;1. Vue du tableau de bord de l'administrateur resources/views/admin/dashboard.blade.php:
                    HTML </h1>

                @extends('layouts.app')

                @section('content')
                    <h1>Tableau de bord de l'administrateur</h1>

                    <ul>
                        <li><a href="{{ route('admin.users') }}">Gérer les utilisateurs</a></li>
                    </ul>
                @endsection
                <h1>
                    Utilisez ce code avec précaution.
                    content_copy
                    2. Vue de la liste des utilisateurs resources/views/admin/users.blade.php:
                    HTML
                </h1>
                @extends('layouts.app')

                @section('content')
                    <h1>Liste des utilisateurs</h1>

                    <table>
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user) }}">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endsection
                <h1>
                    Utilisez ce code avec précaution.
                    content_copy
                    3. Vue de modification d'un utilisateur resources/views/admin/edit-user.blade.php:
                    HTML
                </h1>
                @extends('layouts.app')

                @section('content')
                    <h1>Modifier l'utilisateur</h1>

                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe (optionnel)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                @endsection


            </div>

            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</div>
</body>
</html>


