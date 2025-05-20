@extends('layouts.app')

@section('content')
    {{-- Liste des événements / قائمة الأحداث --}}
    <h2 class="mb-4">Liste des événements</h2>

    <div class="mb-3">
        <a href="{{ route('evenements.create') }}" class="btn btn-success">Ajouter un événement</a>
        <a href="{{ route('experts.index') }}" class="btn btn-secondary">Gérer les experts</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulaire de recherche / نموذج البحث --}}
    <form method="GET" action="{{ route('evenements.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par thème" value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-2">
                <select name="expert_id" class="form-control">
                    <option value="">Filtrer par expert</option>
                    @foreach ($experts as $expert)
                        <option value="{{ $expert->id }}" {{ request('expert_id') == $expert->id ? 'selected' : '' }}>{{ $expert->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </form>

    {{-- Tableau des événements / جدول الأحداث --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Thème</th>
                <th>Date</th>
                <th>Expert</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
                <tr>
                    <td>{{ $evenement->theme }}</td>
                    <td>{{ $evenement->date_debut }} → {{ $evenement->date_fin }}</td>
                    <td>{{ $evenement->expert->nom }}</td>
                    <td>
                        <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="{{ route('ateliers.create', ['evenement_id' => $evenement->id]) }}" class="btn btn-warning btn-sm">Ajouter un atelier</a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
