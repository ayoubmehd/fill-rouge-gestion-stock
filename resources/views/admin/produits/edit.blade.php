@extends('layouts.app')

@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="container">
            <div class="dashboard__wrap">
                <h1 class="mb-0">
                    Create a New Produit
                </h1>
            </div>
        </div>
    </section>

    <section class="my-3 heading dashboard__container">
        <div class="dashboard__wrap flex-column">
        </div>
    </section>

    <section class="heading dashboard__container">

        <div class="container">
            <div class="dashboard__wrap justify-content-center align-items-stretch">

                <div class="card w-100">
                    <div class="card-body">

                        <form method="post" action="{{ route('admin.produits.store') }}">
                            @csrf


                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">{{ __('admin.produits.fome.name.label') }}</label>
                                    <input value="{{ $produit->name }}" type="text" name="name" id="username" class="form-control" placeholder="{{ __('admin.produits.form.name.lable') }}" aria-describedby="helpId" />
                                    <small id="help" class="text-muted">{{ __('admin.produits.form.name.help') }}</small>
                                </div>
                                <div class="form-group col-3">
                                    <label for="prix">{{ __('admin.produits.fome.prix.label') }}</label>
                                    <input value="{{ $produit->prix }}" type="number" name="prix" id="prix" class="form-control" placeholder="{{ __('admin.produits.form.prix.lable') }}" aria-describedby="helpId" />


                                    <small id="help" class="text-muted">{{ __('admin.produits.form.prix.help') }}</small>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">{{ __('admin.produits.fome.quantite.label') }}</label>

                                    <input value="{{ $produit->quantite }}" type="number" name="quantite" id="quantite" class="form-control" placeholder="{{ __('admin.produits.form.quantite.lable') }}" aria-describedby="helpId" />



                                    <small id="help" class="text-muted">{{ __('admin.produits.form.quantite.help') }}</small>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="categorie">{{ __('admin.produits.form.categorie.lable') }}</label>

                                <select class="custom-select" name="categorie" id="categorie">

                                    <option selected disabled>{{ __('admin.produits.form.categorie.placeholder') }}</option>
                                    @foreach($categories as $categorie)
                                    <option {{ $produit->categorie->id === $categorie->id ? 'selected' : '' }} value="{{ $categorie->id }}">{{ $categorie->id }}</option>



                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>


                                <textarea class="form-control" name="description" id="description" placeholder="{{ __('Description') }}" cols="30" rows="10">{{ $produit->description }}</textarea>




                                <small id="description-help" class="text-muted">{{ __('Description') }}</small>


                            </div>

                            <button name="" id="" class="btn text-white btn-primary btn-lg">Save</button>


                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <div>

    </div>
</div>
@endsection
