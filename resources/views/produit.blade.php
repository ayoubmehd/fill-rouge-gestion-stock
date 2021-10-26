@extends('layouts.user')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <h3 class="card-title mb-2">{{ $produit->name }}</h3>
                    <h4 class="card-subtitle mb-3">{{ $produit->prix }} dh</h4>
                    <p class="card-text mb-4">{{ $produit->description }}</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary text-white btn-lg">
                            Order
                        </button>
                        <button type="button" class="btn btn-lg"> {{-- If liked  text-primary --}}
                            <i class="mdi mdi-heart-outline"></i> {{-- If liked heart --}}
                            Like
                        </button>
                        <p class="mb-0">
                            {{ $produit->commandes_count }} Commandes
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-4">
        <div class="d-flex justify-content-center">
            {{ $commandes->links() }}
        </div>

        <div class="row">
            @forelse($commandes as $commande)

            <div class="col-md-6">
                @include('includes.commande', ['commande' => $commande])
            </div>
            @empty
            <div class="col-3 mx-auto text-center">
                Aucun commande
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $commandes->links() }}
        </div>
    </section>
</div>{{-- End container --}}
@endsection
