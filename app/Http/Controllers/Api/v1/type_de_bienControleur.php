<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeDeBien;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class TypeDeBienController extends Controller
{
    /**
     * Affiche la liste des types de biens.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $type_de_biens = TypeDeBien::all();

        return view('type_de_biens.index', compact('type_de_biens'));
    }

    /**
     * Affiche le formulaire de création d'un type de bien.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('type_de_biens.create');
    }

    /**
     * Stocke un nouveau type de bien.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $type_de_bien = TypeDeBien::create($request->all());

        return redirect()->route('type_de_biens.index');
    }

    /**
     * Affiche un type de bien.
     *
     * @param  \App\Models\TypeDeBien  $type_de_bien
     * @return \Illuminate\View\View
     */
    public function show(TypeDeBien $type_de_bien)
    {
        return view('type_de_biens.show', compact('type_de_bien'));
    }

    /**
     * Affiche le formulaire de modification d'un type de bien.
     *
     * @param  \App\Models\TypeDeBien  $type_de_bien
     * @return \Illuminate\View\View
     */
    public function edit(TypeDeBien $type_de_bien)
    {
        return view('type_de_biens.edit', compact('type_de_bien'));
    }

    /**
     * Met à jour un type de bien.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDeBien  $type_de_bien
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TypeDeBien $type_de_bien)
    {
        $type_de_bien->update($request->all());

        return redirect()->route('type_de_biens.index');
    }

    /**
     * Supprime un type de bien.
     *
     * @param  \App\Models\TypeDeBien  $type_de_bien
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TypeDeBien $type_de_bien)
    {
        $type_de_bien->delete();

        return redirect()->route('type_de_biens.index');
    }



    // In TypeDeBienController.php

public function search(Request $request)
{
    $query = TypeDeBien::query();

    // Filter by name (optional)
    if ($request->has('name')) {
        $query->where('name', 'like', "%{$request->name}%");
    }

    $typesDeBiens = $query->get();

    return response()->json($typesDeBiens);

}
}







