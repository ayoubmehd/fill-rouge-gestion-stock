<div class="card shadow">
    <div class="card-body">
        <h3 class="card-title font-weight-bold">{{ Str::limit($produit->name, 40, '...') }}</h3>
        <h4 class="card-title">{{ $produit->prix }} MAD</h4>
        <p class="card-text">
            {{ Str::limit($produit->description, 70, '...') }}
        </p>

        <button type="button" class="btn btn-primary text-white btn-lg">
            Order
        </button>
        <button type="button" class="btn btn-lg"> {{-- If liked  text-primary --}}
            <i class="mdi mdi-heart-outline"></i> {{-- If liked heart --}}
            Like
        </button>
    </div>
</div>
