<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $commandes = Commande::where('user_id', User::find(1)->id)->with(['livraison', 'produits' => function (BelongsToMany $query) {
            $query->select('id')->sum('prix');
        }])->withCount('produits')->paginate(
            $request->has('per_page') ? $request->per_page : 12
        );

        return \view('commandes', \compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $commande = Commande::with(['livraison' => function ($query) {
            $query->with('livreur');
        }])->withCount('produits')->find($id);

        $produits = $commande->produits()->paginate($request->has('per_page') ? $request->per_page : 4);

        return \view('commande', \compact('commande', 'produits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}