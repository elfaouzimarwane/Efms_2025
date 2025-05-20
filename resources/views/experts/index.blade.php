@extends('layouts.app')

@section('content')
    {{-- Liste des experts / قائمة الخبراء --}}
    <h2 class="mb-4">Liste des experts</h2>

    <a href="{{ route('experts.create') }}" class="btn btn-success mb-3">Ajouter un expert</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tableau des experts / جدول الخبراء --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Spécialité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experts as $expert)
                <tr>
                    <td>{{ $expert->nom }}</td>
                    <td>{{ $expert->prenom }}</td>
                    <td>{{ $expert->specialite }}</td>
                    <td>
                        <a href="{{ route('experts.edit', $expert->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/evenements') }}" class="btn btn-secondary mt-3">Retour à l'accueil</a>
@endsection
