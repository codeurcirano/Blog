<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\annonces;
use App\Models\Bien;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controller pour les API liées aux biens immobiliers.
 */
class BienController extends Controller
{
    /**
     * Affiche la liste des biens.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $biens = Bien::all();
        return response()->json($biens);
    }

    /**
     * Affiche un bien.
     *
     * @param Bien $bien
     * @return JsonResponse
     */
    public function show(Bien $bien): JsonResponse
    {
        return response()->json($bien);
    }

    /**
     * Stocke un nouveau bien.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $bien = Bien::create($request->all());

        return response()->json($bien, 201);
    }

    /**
     * Met à jour un bien.
     *
     * @param Request $request
     * @param Bien $bien
     * @return JsonResponse
     */
    public function update(Request $request, Bien $bien)
    {
        $bien->update($request->all());

        return response()->json($bien);
    }

    /**
     * Supprime un bien.
     *
     * @param Bien $bien
     * @return JsonResponse
     */
    public function destroy(Bien $bien)
    {
        $bien->delete();

        return response()->json(null, 204);
    }

    /**
     * Affiche les annonces liées à un bien.
     *
     * @param Bien $bien
     * @return JsonResponse
     */
    public function annonces(Bien $bien): JsonResponse
    {
        $annonces = annonces::where('bien_id', $bien->id)->get();

        return response()->json($annonces);
    }

    /**
     * Affiche les demandes liées à un bien.
     *
     * @param Bien $bien
     * @return JsonResponse
     */
    public function demandes(Bien $bien)
    {
        $demandes = Demande::where('bien_id', $bien->id)->get();

        return response()->json($demandes);
    }
}
