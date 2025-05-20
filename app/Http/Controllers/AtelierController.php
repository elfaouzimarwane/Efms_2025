<?php

namespace App\Http\Controllers;

use App\Models\Atelier;
use App\Models\Evenement;
use Illuminate\Http\Request;

class AtelierController extends Controller
{
    // Affiche le formulaire de création d'un atelier / عرض نموذج إنشاء ورشة
    public function create(Request $request)
    {
        $evenements = Evenement::all(); // Fetch all events
        $selectedEvenementId = $request->get('evenement_id'); // Get the event ID from the request
        $evenement = $selectedEvenementId ? Evenement::find($selectedEvenementId) : null; // Fetch the selected event

        if (!$evenement && $selectedEvenementId) {
            return redirect()->route('evenements.index')->with('error', 'Événement introuvable.');
        }

        return view('ateliers.create', compact('evenement', 'evenements', 'selectedEvenementId')); // Pass $evenement to the view
    }

    // Enregistre un nouvel atelier dans la base de données / حفظ ورشة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'evenement_id' => 'required|exists:evenements,id', // Validate evenement_id
        ]);

        Atelier::create([
            'nom' => $request->nom,
            'evenement_id' => $request->evenement_id, // Ensure evenement_id is set
        ]);

        return redirect()->route('evenements.show', $request->evenement_id)->with('success', 'Atelier ajouté avec succès.');
    }

    // Affiche le formulaire de modification d'un atelier / عرض نموذج تعديل ورشة
    public function edit(Atelier $atelier)
    {
        return view('ateliers.edit', compact('atelier'));
    }

    // Met à jour les informations d'un atelier / تحديث معلومات ورشة
    public function update(Request $request, Atelier $atelier)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $atelier->update($request->all());

        return redirect()->route('evenements.show', $atelier->evenement_id)->with('success', 'Atelier mis à jour avec succès.');
    }

    // Supprime un atelier spécifique / حذف ورشة معينة
    public function destroy(Atelier $atelier)
    {
        $atelier->delete();

        return redirect()->route('evenements.show', $atelier->evenement_id)->with('success', 'Atelier supprimé.');
    }
}
