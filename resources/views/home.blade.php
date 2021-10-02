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
            <div class="col-md-6">
                @include('includes.produit')
            </div>
            <div class="col-md-6">
                @include('includes.produit')
            </div>
            <div class="col-md-6">
                @include('includes.produit')
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
                @include('includes.order')
            </div>
            <div class="col-md-3">
                @include('includes.order')
            </div>
            <div class="col-md-3">
                @include('includes.order')
            </div>
            <div class="col-md-3">
                @include('includes.order')
            </div>
        </div>
    </section>

</div>
@endsection
