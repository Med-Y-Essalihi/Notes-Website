<!-- resources/views/items/create.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        max-width: 600px;
        margin: 60px auto;
        background-color: #fff;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: fadeInScale 0.7s ease forwards;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    h2 {
        font-weight: 700;
        font-size: 28px;
        color: #1f2937;
        margin-bottom: 25px;
        text-align: center;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
    }

    input[type="text"],
    textarea {
         width: 565px;
        padding: 12px 15px;
        border: 1.8px solid #d1d5db;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
        resize: vertical;
    }

    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
    }

    textarea {
        min-height: 120px;
        width: 565px;
    }

    .btn-submit {
        margin-top: 25px;
        width: 100%;
        background-color: #2563eb;
        color: white;
        font-weight: 700;
        padding: 14px 0;
        border: none;
        border-radius: 12px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #1d4ed8;
    }

    .back-link {
        display: inline-block;
        width: 600px;
        text-align: center;
        margin-top: 20px;
        border-radius: 12px;
        padding : 14px 0;
        color: white;
        background-color: #2563eb;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: #1d4ed8;
        background-color: white;
        border: 2px solid #1d4ed8;
        text-align: center;
    }

    .error-message {
        color: #ef4444;
        font-size: 14px;
        margin-top: 6px;
    }
</style>

<div class="form-container">
    <h2>Ajouter un nouvel Item</h2>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="description" style="margin-top: 20px;">Description</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        @error('description')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn-submit">Enregistrer</button>
    </form>

    <a href="{{ route('items.index') }}" class="back-link"> Retour à la liste des Items</a>
</div>
@endsection
