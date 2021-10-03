<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $produits =
            Produit::with(
                ['users_likes' =>
                function (BelongsToMany $query) {
                    $query->where('user_id', User::find(1)->id);
                }]
            )->paginate($request->has('per_page') ? $request->per_page : 4, ['id', 'name', 'prix', 'description']);
        // dd($produits);

        return \view('produits', \compact('produits'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}