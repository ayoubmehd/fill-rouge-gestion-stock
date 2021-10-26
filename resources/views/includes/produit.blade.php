<div class="card shadow mb-4">
    <div class="card-body">
        @php
        $produit->description = Str::limit($produit->description, 70, '...');
        $produit->name = Str::limit($produit->name, 40, '...');
        @endphp

        <h3 class="card-title font-weight-bold">{{ $produit->name }}</h3>
        <h4 class="card-title">{{ $produit->prix }} MAD</h4>
        <p class="card-text">
            {{ $produit->description }}
        </p>

        <produit-actions :produit='@json($produit)' />

    </div>
</div>
