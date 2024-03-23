<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Affiche la liste des messages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    /**
     * Affiche le formulaire de création d'un message.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Stocke un nouveau message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $message = Message::create($request->all());

        return redirect()->route('messages.index');
    }
   

    /**
     * Met à jour un message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Message $message)
    {
        $message->update($request->all());

        return redirect()->route('messages.index');
    }




    /**
     * Affiche la liste des messages.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $messages = Message::all();

        return response()->json($messages);
    }

    /**
     * Affiche un message.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Message $message)
    {
        return response()->json($message);
    }

    /**
     * Stocke un nouveau message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'content' => $request->content,
            'annonce_id' => $request->annonce_id,
            'sender_id' => Auth::id(),
        ]);

        return response()->json($message, 201);
    }

    /**
     * Supprime un message.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Message $message)
    {
        if (Auth::id() == $message->sender_id) {
            $message->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

    /**
     * Affiche l'annonce associée à un message.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function annonce(Message $message)
    {
        $annonce = Annonce::where('id', $message->annonce_id)->first();

        return response()->json($annonce);
    }
}
