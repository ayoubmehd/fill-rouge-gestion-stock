@extends('layouts.user')

@section('content')
<div class="container">
    <section class="pt-4">
        @include('includes.section-heading', [
        'sectionTitle' => 'Product You liked',
        'sectionTo' => route('likes.index'),
        'sectionIcon' => 'heart'
        ])

        <div class="row py-3">
            @php
            $pArray = ['name' => '', 'description' => '', 'prix' => ''];
            @endphp
            <div class="col-md-6">
                @include('includes.produit', ['produit' => (object)$pArray])

            </div>
            <div class="col-md-6">
                @include('includes.produit', ['produit' =>(object)$pArray])


            </div>
            <div class="col-md-6">
                @include('includes.produit', ['produit' => (object)$pArray])


            </div>
        </div>
    </section>
    <section class="pt-4">
        @include('includes.section-heading', [
        'sectionTitle' => 'Your Orders',
        'sectionTo' => route('orders.index'),
        'sectionIcon' => 'currency-usd'
        ])

        <div class="row py-3">
            <div class="col-md-3">
                @php
                $oArray = ['id' => '', 'produits_count' => '']

                @endphp
                @include('includes.commande', ['commande' => (object) $oArray ])






            </div>
            <div class="col-md-3">
                @include('includes.commande', ['commande' => (object) $oArray ])






            </div>
            <div class="col-md-3">
                @include('includes.commande', ['commande' => (object) $oArray ])
            </div>
            <div class="col-md-3">
                @include('includes.commande', ['commande' => (object) $oArray ])
            </div>
        </div>
    </section>

</div>
@endsection
