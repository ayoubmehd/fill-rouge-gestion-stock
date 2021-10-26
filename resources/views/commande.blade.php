@extends('layouts.user')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <h3 class="card-title"># {{ $commande->id }}</h3>
                    <p class="card-text">{{ $commande->livraison->livreur->name }}</p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-center justify-content-between">
                    <p class="card-text">1000dh</p>
                    <p class="card-text d-flex flex-column align-items-center">
                        <i class="mdi mdi-truck h3 mb-0 order-icon"></i>
                        Shipped
                    </p>
                    <p class="card-text">
                        Livrer Le {{ $commande->livraison->date_livraison }}
                    </p>
                </div>
                <div class="col d-flex flex-column justify-content-between align-items-end">

                    <p class="card-text">
                        {{ $commande->produits_count }} Produits
                    </p>
                    <p class="card-text">
                        Pas Encore Recut
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-4">

        {{ $produits->links() }}

        <div class="row mb-2">
            @foreach($produits as $produit)
            <div class="col-md-6">
                @include('includes.produit', ['produit' => $produit])
            </div>
            @endforeach
        </div>

        {{ $produits->links() }}

    </section>


</div>
@endsection
