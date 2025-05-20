@extends('layouts.app')

@section('content')
    {{-- Titre de la page --}}
    <h2 class="mb-4">Ajouter un événement</h2>

    {{-- Affiche les erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire pour ajouter un événement --}}
    <form action="{{ route('evenements.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Thème :</label>
            <input type="text" name="theme" class="form-control" value="{{ old('theme') }}">
        </div>

        <div class="col-md-12">
            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Date début :</label>
            <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut') }}">
            <small class="text-muted">La date doit être comprise entre 1900 et 2100.</small>
        </div>

        <div class="col-md-6">
            <label class="form-label">Date fin :</label>
            <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin') }}">
            <small class="text-muted">La date doit être comprise entre 1900 et 2100.</small>
        </div>

        <div class="col-md-6">
            <label class="form-label">Coût journalier :</label>
            <input type="number" step="0.01" name="cout_journalier" class="form-control" value="{{ old('cout_journalier') }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Expert :</label>
            <select name="expert_id" class="form-select">
                <option value="">-- Choisir un expert --</option>
                @foreach($experts as $expert)
                    <option value="{{ $expert->id }}" {{ old('expert_id') == $expert->id ? 'selected' : '' }}>
                        {{ $expert->nom }} {{ $expert->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@endsection
