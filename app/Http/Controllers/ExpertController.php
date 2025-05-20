<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    // Affiche la liste des experts / عرض قائمة الخبراء
    public function index()
    {
        $experts = Expert::all();
        return view('experts.index', compact('experts'));
    }

    // Affiche le formulaire de création d'un expert / عرض نموذج إنشاء خبير
    public function create()
    {
        return view('experts.create');
    }

    // Enregistre un nouvel expert dans la base de données / حفظ خبير جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255', // Allow null values
        ]);

        Expert::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'specialite' => $request->specialite, // Save specialite explicitly
        ]);

        return redirect()->route('experts.index')->with('success', 'Expert ajouté avec succès.');
    }

    // Affiche le formulaire de modification d'un expert / عرض نموذج تعديل خبير
    public function edit(Expert $expert)
    {
        return view('experts.edit', compact('expert'));
    }

    // Met à jour les informations d'un expert / تحديث معلومات خبير
    public function update(Request $request, Expert $expert)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255', // Allow null values
        ]);

        $expert->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'specialite' => $request->specialite, // Update specialite explicitly
        ]);

        return redirect()->route('experts.index')->with('success', 'Expert mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);

        // Delete the expert and related events if necessary
        $expert->delete();

        return redirect()->route("experts.index")->with('success','Expert mis a jour avec succès');
    }
}
