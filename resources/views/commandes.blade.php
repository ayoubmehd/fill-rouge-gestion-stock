@extends('layouts.user')

@section('content')
<div class="container">

    <div class="d-flex justify-content-center">
        {{ $commandes->links() }}
    </div>

    <div class="row">
        @foreach($commandes as $commande)

        <div class="col-md-3">
            @include('includes.commande', ['commande' => $commande])
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $commandes->links() }}
    </div>

</div>
@endsection
