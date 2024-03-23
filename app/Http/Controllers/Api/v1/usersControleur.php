<?php
namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Models\annonces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class UseController extends Controller

{
    /**
     * Affiche la liste des utilisateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Affiche le formulaire de création d'un utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Stocke un nouvel utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Affiche un utilisateur.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Affiche le formulaire de modification d'un utilisateur.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Met à jour un utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Supprime un utilisateur.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }



    /**
     * Affiche les annonces publiées par un utilisateur.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function annonces(User $user)
    {
        $annonces = Annonce::where('user_id', $user->id)->get();

        return response()->json($annonces);
    }

    /**
     * Se connecter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    /**
     * Se déconnecter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}
