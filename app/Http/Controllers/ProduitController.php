<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user_id = \auth()->user()->id;

        $users_likes = DB::table('users_like_produits')
            ->select(['user_id', 'produit_id', DB::raw('COUNT(*)')])
            ->whereNull('user_id')
            ->orWhere('user_id', '=', $user_id)
            ->groupBy(['user_id', 'produit_id']);

        $produits =
            Produit::select('*')->selectRaw('IF(likes.user_id = ?, true, false) as liked', [$user_id])
            ->leftJoinSub($users_likes, 'likes', function ($join) {
                $join->on('produits.id', '=', 'likes.produit_id');
            })
            ->orderBy('produits.id')
            ->paginate(12);

        // dd($produits);

        return \view('produits', \compact('produits'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $produit = Produit::withCount('commandes')->find($id);

        $commandes = $produit->commandes()->paginate($request->has('per_page') ? $request->per_page : 4);

        return \view('produit', \compact('commandes', 'produit'));
    }
}