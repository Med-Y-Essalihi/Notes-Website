<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Resource App')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        header {
            background: #007bff;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        a, button {
            color: white;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            background: #0069d9;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover, button:hover {
            background: #0053ba;
        }
        main {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
        }
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            animation: fadeIn 0.6s ease forwards;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-10px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .btn-add {
            background: #28a745;
            margin-bottom: 1rem;
        }
        .btn-add:hover {
            background: #218838;
        }
        .actions button {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
<header>
    <div><a href="{{ route('items.index') }}">Resource App</a></div>
    <div>
        @auth
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        @endauth
    </div>
</header>
<main>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
