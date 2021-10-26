<?php

namespace App\Http\Controllers\Livreur;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livreur_id = Auth::user()->id;

        // $commandes = Livraison::where('livreur_id', $livreur_id)->with('commande')->paginate(12, ['id']);
        $commandes = Commande::withCount('produits')->where(function ($query) {
            $query->select('livreur_id')
                ->from('livraisons')
                ->whereColumn('livraisons.id', 'commandes.livraison_id');
        }, $livreur_id)->paginate(24);

        return view('livreur.orders', \compact('commandes'));
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
    public function show($id)
    {
        // $livreur_id = Auth::check() ? Auth::user()->id : 137;
        // $commande = Commande::withCount('produits')->where(function ($query) {
        //     $query->select('livreur_id')
        //         ->from('livraisons')
        //         ->whereColumn('livraisons.id', 'commandes.livraison_id');
        // }, $livreur_id)->find($id);

        // dd($commande);
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