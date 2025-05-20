@extends('layouts.app')

@section('content')
    {{-- Titre de la page / عنوان الصفحة --}}
    <h2 class="mb-4">Modifier un expert</h2>

    {{-- Affiche les erreurs de validation / عرض أخطاء التحقق --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire pour modifier un expert / نموذج لتعديل خبير --}}
    <form action="{{ route('experts.update', $expert->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $expert->nom) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $expert->prenom) }}" required>
        </div>

        <div class="col-md-12">
            <label class="form-label">Spécialité :</label>
            <input type="text" name="specialite" class="form-control" value="{{ old('specialite', $expert->specialite) }}" required>
        </div>

        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <input type="text" name="specialite" id="specialite" class="form-control" value="{{ old('specialite', $expert->specialite) }}">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Retour à l'accueil</a>
        </div>
    </form>
@endsection
