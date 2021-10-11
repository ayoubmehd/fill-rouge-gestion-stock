@extends('layouts.livreur')

@section('content')
<div class="container">



    <div class="d-flex justify-content-center">
        {{ $livraisons->links() }}


    </div>
    <div class="row">
        @foreach($livraisons as $livraison)
        <div class="col-md-6">
            @include('includes.commentaire', ['commentaire' => $livraison->commentaire, 'commande' => $livraison->commande])
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $livraisons->links() }}


    </div>


</div>
@endsection
