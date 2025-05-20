@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Modifier un événement</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evenements.update', $evenement->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Thème :</label>
            <input type="text" name="theme" class="form-control" value="{{ old('theme', $evenement->theme) }}">
        </div>

        <div class="col-md-12">
            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control">{{ old('description', $evenement->description) }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Date début :</label>
            <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $evenement->date_debut) }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Date fin :</label>
            <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $evenement->date_fin) }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Coût journalier :</label>
            <input type="number" step="0.01" name="cout_journalier" class="form-control" value="{{ old('cout_journalier', $evenement->cout_journalier) }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Expert :</label>
            <select name="expert_id" class="form-select">
                @foreach($experts as $expert)
                    <option value="{{ $expert->id }}" {{ old('expert_id', $evenement->expert_id) == $expert->id ? 'selected' : '' }}>
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