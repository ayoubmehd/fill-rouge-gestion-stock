<div class="card shadow">
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-md-4 d-flex flex-column justify-content-between">
                <h3 class="card-title"># {{ $commande->id }}


                </h3>
                <p class="card-text"></p>
            </div>
            <div class=" col-md-6 d-flex flex-column justify-content-between align-items-end">
                <p class="card-text">
                    Shipped
                    <i class="mdi mdi-truck h3 mb-0 order-icon"></i>
                </p>
                <p class="card-text">
                    {{ $commande->produits_count }} Produits
                </p>
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-between">
                <h3 class="card-title">
                    {{ $commande->user->name }}

                </h3>
                <p class="card-text">
                    {{ $commentaire->contenu }}
                </p>
            </div>
            <div class="col d-flex flex-column justify-content-between align-items-end">
                <i class="mdi mdi-star-check text-primary h2"></i>
            </div>
        </div>
    </div>
</div>
