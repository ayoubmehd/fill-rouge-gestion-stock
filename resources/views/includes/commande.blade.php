<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 d-flex flex-column justify-content-between">
                <h3 class="card-title"># {{ $commande->id }}</h3>
                <p class="card-text"></p>
            </div>
            <div class="col d-flex flex-column justify-content-between align-items-end">
                <p class="card-text">
                    Shipped
                    <i class="mdi mdi-truck h3 mb-0 order-icon"></i>
                </p>
                <p class="card-text">
                    {{ $commande->produits_count }}
                </p>
            </div>
        </div>
    </div>
</div>
