<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Méthode pour afficher la liste complète des catégories
     */
    public function index()
    {
        // Récupérer toutes les catégories en base de données - Model Categorie
        $categories = Categorie::all();

        // Retourner la vue de listing des catégories en lui passant l'ensemble de mes catégories
        return view("admin.categories.index", ['categories' => $categories]);
    }

    /**
     * Méthode pour afficher le formulaire de création d'une catégorie
     */
    public function create()
    {
        // Retourner la vue formulaire de création des catégories
        return view("admin.categories.form");
    }

    /**
     * Méthode qui traite les informations provenant du formulaire de création d'une catégorie
     *
     * @param Request $request - Les informations envoyées en POST via le formulaire
     */
    public function store(Request $request)
    {
        // Étape 1 : Valider le format de données
        $request->validate([
            'name' => ['required', 'unique:categories', 'min:3']
        ]);

        // Étape 2 : Créer la catégorie en BDD - Model Categorie
        Categorie::create([
            'name' => $request->name
        ]);

        // Étape 3 : Retourner la vue de listing des categories
        return $this->index();
    }

    /**
     * Méthode pour afficher les détails sur une catégorie
     *
     * @param Categorie $categorie - Categorie sélectionnée
     */
    public function show(Categorie $categorie)
    {
        // Retourner la vue de détail d'une catégorie en lui passant la catégorie concernée
        return view("admin.categories.show", ['categorie' => $categorie]);
    }

    /**
     * Méthode pour afficher le formulaire de modification d'une catégorie
     *
     * @param Categorie $categorie - Categorie sélectionnée
     */
    public function edit(Categorie $categorie)
    {
        // Retourner la vue formulaire de modification d'une catégorie en lui passant la catégorie concernée
        return view("admin.categories.form", ['categorie' => $categorie]);
    }

    /**
     * Méthode de traitement de modification d'une catégorie
     *
     * @param Request $request - Les informations envoyées en PUT via le formulaire
     * @param Categorie $categorie - Categorie sélectionnée
     */
    public function update(Request $request, Categorie $categorie) {
        // Étape 1 : Valider le format de données
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $categorie->id, 'min:3']
        ]);

        // Étape 2 : Modifier la catégorie en BDD - Model Categorie
        $categorie->name = $request->name;
        $categorie->save();

        // Étape 3 : Retourner la vue de listing des categories
        return $this->index();
    }

    /**
     * Méthode de suppression d'une catégorie
     *
     * @param Categorie $categorie - Categorie sélectionnée
     */
    public function destroy(Categorie $categorie) {
        // Étape 1 : Supprimer la catégorie - Model Categorie
        $categorie->delete();

        // Étape 2 : Retourner la vue de listing des categories
        return $this->index();
    }
}
