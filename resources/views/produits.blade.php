@extends('layouts.user')

@section('content')
<div class="container">

    <div class="d-flex justify-content-center">
        {{ $produits->links() }}
    </div>

    <div class="row">
        @foreach($produits as $produit)
        <div class="col-md-6">
            @include('includes.produit', ['produit' => $produit])
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $produits->links() }}
    </div>

</div>
@endsection
