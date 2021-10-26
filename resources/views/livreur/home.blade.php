@extends('layouts.livreur')

@section('content')
<div class="container">
    <section class="pt-4">
        @include('includes.section-heading', [
        'sectionTitle' => 'New Orders',
        'sectionTo' => route('livreur.orders.index'),
        'sectionIcon' => 'currency-usd'
        ])

        <div class="row py-3">
            {{-- <div class="col-md-6">
                @include('includes.produit')
            </div>
            <div class="col-md-6">
                @include('includes.produit')
            </div>
            <div class="col-md-6">
                @include('includes.produit')
            </div> --}}
        </div>
    </section>
    <section class="pt-4">
        @include('includes.section-heading', [
        'sectionTitle' => 'Commentiares',
        'sectionTo' => '/',
        'sectionIcon' => 'heart'
        ])

        <div class="row py-3">
            <div class="col-md-6">
                @include('includes.commentaire')
            </div>
        </div>
    </section>

</div>
@endsection
