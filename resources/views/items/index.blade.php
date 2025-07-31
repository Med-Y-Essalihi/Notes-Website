<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1100px;
        margin: 50px auto;
        background: #fff;
        border-radius: 14px;
        padding: 30px 40px;
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
        animation: slideFadeIn 0.8s ease forwards;
    }

    @keyframes slideFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header h1 {
        font-weight: 700;
        font-size: 32px;
        color: #111827;
    }

    .btn-add {
        background-color: #2563eb;
        color: white;
        font-weight: 600;
        padding: 12px 22px;
        border-radius: 10px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-add:hover {
        background-color: #1d4ed8;
        box-shadow: 0 6px 18px rgba(29, 78, 216, 0.5);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    thead tr {
        background: transparent;
    }

    thead th {
        text-align: left;
        padding: 14px 12px;
        color:rgb(255, 255, 255);
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        border-bottom: 2px solid #e5e7eb;
    }

    tbody tr {
        background: #f9fafb;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgb(0 0 0 / 0.05);
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background: #e0e7ff;
    }

    tbody td {
        padding: 16px 12px;
        font-size: 16px;
        color: #374151;
    }

    tbody td.actions {
        display: flex;
        gap: 12px;
    }

.btn-edit,.btn-delete {
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    
    color: white;
    font-size: 14px;
    min-width: 90px; /* same width for uniformity */
    text-align: center;
}

.btn-edit {
    background-color:rgb(0, 161, 54); /* blue */
    box-shadow: 0 3px 8px rgb(0, 107, 36);
}

.btn-edit:hover {
    background-color: #1d4ed8;
    box-shadow: 0 4px 14px rgba(29, 78, 216, 0.6);
}

    .btn-delete {
        background-color: #ef4444; /* red */
        box-shadow: 0 3px 8px rgba(239, 68, 68, 0.4);
        margin-top: 8px;
     }

    .btn-delete:hover {
        background-color: #b91c1c;
        box-shadow: 0 4px 14px rgba(185, 28, 28, 0.6);
    }

    .alert-success {
        padding: 15px 20px;

        background-color: #d1fae5;
        color: #065f46;
        
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(6, 95, 70, 0.2);
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Liste des Items</h1>
        <a href="{{ route('items.create') }}" class="btn-add">Ajouter un Item</a>
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="actions">
                        <a href="{{ route('items.edit', $item->id) }}" style= 'background-color: rgba(185, 28, 28, 0);'>
                            <button class="btn-edit">Modifier</button>
                        </a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet item ?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding: 25px 0; color: #6b7280; font-style: italic;">
                        Aucun item trouvé.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
