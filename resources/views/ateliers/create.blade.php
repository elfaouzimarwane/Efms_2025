@extends('layouts.app')

@section('content')
    <h2 class="mb-4">
        Ajouter un atelier 
        @if ($evenement)
            à l'événement : {{ $evenement->theme }}
        @endif
    </h2>

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

    {{-- Formulaire pour ajouter un atelier / نموذج لإضافة ورشة --}}
    <form action="{{ route('ateliers.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-12">
            <label class="form-label">Nom de l'atelier :</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
        </div>
        <div class="col-md-12">
            <label for="evenement_id" class="form-label">Événement</label>
            <select name="evenement_id" id="evenement_id" class="form-control" required>
                @foreach($evenements as $evenementOption)
                    <option value="{{ $evenementOption->id }}" 
                        {{ $selectedEvenementId == $evenementOption->id ? 'selected' : '' }}>
                        {{ $evenementOption->theme }}
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
