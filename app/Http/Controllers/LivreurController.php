<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Livraison;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
        expected result

        [
            {
                id: 10,
                name: "livreur Name",
                score: 30,
                numberOfOrderDeliered: 100,
            },
        ]

            SELECT users.id, (SELECT COUNT(livraisons.id) FROM livraisons WHERE livraisons.status = 'livrer' AND livraisons.livreur_id = users.id) AS nbCommandesLivrer , SUM(commentaires.point) as score FROM `users` LEFT JOIN livraisons ON livraisons.livreur_id = users.id LEFT JOIN commentaires ON livraisons.id = commentaires.livraison_id WHERE role = 'livreur' GROUP BY users.id  
            ORDER BY `score`  DESC

            SELECT users.id, (SELECT SUM(commentaires.point) FROM commentaires WHERE `livraison_id` in (SELECT id FROM livraisons WHERE livraisons.livreur_id = users.id)) as score FROM `users` WHERE role = 'livreur' GROUP BY users.id; 

        */

        $livreurs = User::where('role', 'livreur')
            ->select('users.id', 'name')
            ->selectRaw("SUM(commentaires.point) as 'point'")
            ->withCount(['livraisons' => function (Builder $query) {
                $query->where('status', 'livrer');
            }])
            ->leftJoin('livraisons', 'users.id', '=', 'livraisons.livreur_id')
            ->leftJoin('commentaires', 'livraisons.id', '=', 'commentaires.livraison_id')
            ->groupBy('users.id')->orderBy('point', "DESC")->get();

        return \response()->json($livreurs);
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
        //
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