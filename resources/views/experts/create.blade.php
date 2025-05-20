@extends('layouts.app')

@section('content')
    {{-- Titre de la page / عنوان الصفحة --}}
    <h2 class="mb-4">Ajouter un expert</h2>

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

    {{-- Formulaire pour ajouter un expert / نموذج لإضافة خبير --}}
    <form action="{{ route('experts.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Prénom :</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
        </div>

        <div class="col-md-12">
            <label class="form-label">Spécialité :</label>
            <input type="text" name="specialite" class="form-control" value="{{ old('specialite') }}">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ url('/evenements') }}" class="btn btn-secondary">Retour à l'accueil</a>
        </div>
    </form>
@endsection
