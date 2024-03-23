<?php

namespace App\Http\Controllers\Api\v;
use App\Models\Annonce;
use App\Models\Bien;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnoncesRequest;
use App\Http\Requests\UpdateAnnoncesRequest;
use App\Http\Controllers\Controller;


use App\Models\Demande;


/**
 * Contrôleur pour les API liées aux annonces immobilières.
 */
class AnnonceController extends Controller
{
    /**
     * Affiche la liste des annonces.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $annonces = Annonce::all();

        return response()->json($annonces);
    }

    /**
     * Affiche une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Annonce $annonce)
    {
        return response()->json($annonce);
    }

    /**
     * Stocke une nouvelle annonce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $annonce = Annonce::create($request->all());

        return response()->json($annonce, 201);
    }

    /**
     * Met à jour une annonce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Annonce $annonce)
    {
        $annonce->update($request->all());

        return response()->json($annonce);
    }

    /**
     * Supprime une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return response()->json(null, 204);
    }

    /**
     * Affiche le bien lié à une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function bien(Annonce $annonce)
    {
        $bien = Bien::where('id', $annonce->bien_id)->first();

        return response()->json($bien);
    }

    /**
     * Affiche les demandes liées à une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function demandes(Annonce $annonce)
    {
        $demandes = Demande::where('annonce_id', $annonce->id)->get();

        return response()->json($demandes);
    }
}







/**
 * Contrôleur pour les API liées aux annonces immobilières.
 */
class AnnoncesController extends Controller
{
    /**
     * Affiche la liste des annonces.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Annonce::query();

        // Filtre par type de bien
        if ($request->has('type_de_bien_id')) {
            $query->where('type_de_bien_id', $request->type_de_bien_id);
        }

        // Filtre par localisation
        if ($request->has('localisation')) {
            $query->where('localisation', 'like', "%{$request->localisation}%");
        }

        // Filtre par prix minimum
        if ($request->has('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }

        // Filtre par prix maximum
        if ($request->has('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }

        // Filtre par statut
        if ($request->has('statut')) {
            $query->where('statut', $request->statut);
        }

        $annonces = $query->get();

        return response()->json($annonces);
    }

    /**
     * Affiche une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Annonce $annonce)
    {
        return response()->json($annonce);
    }

    /**
     * Stocke une nouvelle annonce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $annonce = Annonce::create($request->all());

        return response()->json($annonce, 201);
    }

    /**
     * Met à jour une annonce.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Annonce $annonce)
    {
        $annonce->update($request->all());

        return response()->json($annonce);
    }

    /**
     * Supprime une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return response()->json(null, 204);
    }

    /**
     * Affiche le bien lié à une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function bien(Annonce $annonce)
    {
        $bien = Bien::where('id', $annonce->bien_id)->first();

        return response()->json($bien);
    }

    /**
     * Affiche l'utilisateur qui a publié une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Annonce $annonce)
    {
        $user = User::where('id', $annonce->user_id)->first();

        return response()->json($user);
    }

   /**
     * Affiche les messages liés à une annonce.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\JsonResponse
     */
    public function messages(Annonce $annonce)
    {
        $messages = Message::where('annonce_id', $annonce->id)->get();

        return response()->json($messages);
    }
}
