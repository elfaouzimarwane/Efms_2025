<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Expert;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    // Affiche la liste des événements
    public function index(Request $request)
    {
        $query = Evenement::with('expert');

        if ($request->filled('search')) {
            $query->where('theme', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date_debut', '<=', $request->date)
                  ->whereDate('date_fin', '>=', $request->date);
        }

        if ($request->filled('expert_id')) {
            $query->where('expert_id', $request->expert_id);
        }

        $evenements = $query->get();
        $experts = Expert::all();

        return view('evenements.index', compact('evenements', 'experts'));
    }

    // Affiche le formulaire de création d'un événement
    public function create()
    {
        $experts = Expert::all();
        return view('evenements.create', compact('experts'));
    }

    // Enregistre un nouvel événement dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date|before_or_equal:date_fin|after_or_equal:1900-01-01|before_or_equal:2100-12-31',
            'date_fin' => 'required|date|after_or_equal:date_debut|after_or_equal:1900-01-01|before_or_equal:2100-12-31',
            'cout_journalier' => 'required|numeric|min:0',
            'expert_id' => 'required|exists:experts,id',
        ]);

        Evenement::create($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement ajouté avec succès.');
    }

    // Affiche les détails d'un événement spécifique
    public function show($id)
    {
        $evenement = Evenement::with('expert')->findOrFail($id);
        return view('evenements.show', compact('evenement'));
    }

    // Affiche le formulaire de modification d'un événement
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        $experts = Expert::all();
        return view('evenements.edit', compact('evenement', 'experts'));
    }

    // Met à jour les informations d'un événement
    public function update(Request $request, $id)
    {
        $request->validate([
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date|before_or_equal:date_fin',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'cout_journalier' => 'required|numeric|min:0',
            'expert_id' => 'required|exists:experts,id',
        ]);

        $evenement = Evenement::findOrFail($id);
        $evenement->update($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès.');
    }

    // Supprime un événement spécifique
    public function destroy($id)
    {
        Evenement::findOrFail($id)->delete();
        return redirect()->route('evenements.index')->with('success', 'Événement supprimé.');
    }

    public function __construct()
{
    $this->middleware('check.cout_journalier')->only(['store', 'update']);
}
}
