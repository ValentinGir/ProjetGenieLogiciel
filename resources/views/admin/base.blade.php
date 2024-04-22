@extends("layouts.app")
@section('titre', 'Admin')

@section('contenu')
    <style>

        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

    </style>
    <div class="sidebar">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="{{ route('admin.users') }}">Utiliseurs</a></li>
            <li><a href="{{ route('admin.domaines') }}">Domaines</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    @yield('content')
@endsection
@section('scripts')
    @yield('scripts')
@endsection
