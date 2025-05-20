@extends('layouts.app')

@section('content')
    {{-- Détails de l'événement / تفاصيل الحدث --}}
    <h2 class="mb-4">Détails de l'événement</h2>

    <div class="card p-4">
        <p><strong>Thème :</strong> {{ $evenement->theme }}</p>
        <p><strong>Description :</strong> {{ $evenement->description }}</p>
        <p><strong>Date :</strong> {{ $evenement->date_debut }} → {{ $evenement->date_fin }}</p>
        <p><strong>Coût journalier :</strong> {{ $evenement->cout_journalier }} MAD</p>
        <p><strong>Expert :</strong> {{ $evenement->expert->nom }} {{ $evenement->expert->prenom }}</p>
    </div>

    {{-- Liste des ateliers / قائمة الورشات --}}
    <h3>Ateliers</h3>
    <ul>
        @foreach($evenement->ateliers as $atelier)
            <li>{{ $atelier->nom }}</li>
        @endforeach
    </ul>
    {{-- Boutons d'action / أزرار الإجراءات --}}
    <a href="{{ route('ateliers.create', $evenement->id) }}" class="btn btn-primary">Ajouter un Atelier</a>

    <a href="{{ route('evenements.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
@endsection
