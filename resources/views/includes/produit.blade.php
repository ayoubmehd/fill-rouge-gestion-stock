<div class="card shadow mb-4">
    <div class="card-body">
        <h3 class="card-title font-weight-bold">{{ Str::limit($produit->name, 40, '...') }}</h3>
        <h4 class="card-title">{{ $produit->prix }} MAD</h4>
        <p class="card-text">
            {{ Str::limit($produit->description, 70, '...') }}
        </p>

        <produit-actions :produit='{id: @json($produit->id), liked: @json($produit->liked)}' />



    </div>
</div>
