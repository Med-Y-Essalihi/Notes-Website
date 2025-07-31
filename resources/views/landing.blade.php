<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue | Resource App</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
        }

        .container {
            animation: fadeInUp 1s ease-out;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        a.button {
            padding: 14px;
            background: white;
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
        }

        a.button:hover {
            background: #f0f0f0;
            transform: scale(1.05);
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur Resource App</h1>
        <p>Gérez vos ressources facilement. Connectez-vous pour commencer.</p><br>
        <a class="button" href="{{ route('register') }}" >Créer un compte</a><br><br><br>
        <a class="button" href="{{ route('login') }}" >Se connecter</a>
    </div>
</body>
</html>
