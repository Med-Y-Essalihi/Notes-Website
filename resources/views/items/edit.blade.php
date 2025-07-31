@extends('layouts.app')

@section('title', 'Modifier un Item')

@section('content')
<h2>Modifier l'item</h2>

@if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('items.update', $item) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}" required style="width:100%; padding:0.5rem; margin-bottom:1rem;"/>
    </div>
    <div>
        <label for="description">Description</label><br />
        <textarea id="description" name="description" rows="4" style="width:100%; padding:0.5rem;">{{ old('description', $item->description) }}</textarea>
    </div>
    <button type="submit" style="margin-top:1rem; background:#007bff;">Mettre à jour</button>
</form>

<a href="{{ route('items.index') }}" style="display:inline-block; margin-top:1rem;">Retour</a>
@endsection
