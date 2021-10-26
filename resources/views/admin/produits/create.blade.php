@extends('layouts.admin')


@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">

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

        <div class="container d-flex justify-content-center">

            <div class="dashboard__wrap justify-content-center align-items-stretch">

                <div class="card w-100">
                    <div class="card-body">

                        <form method="post" action="{{ route('admin.produits.store') }}">
                            @csrf


                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">name</label>
                                    <input type="text" name="name" id="username" class="form-control" placeholder="name" aria-describedby="helpId" />

                                </div>
                                <div class="form-group col-3">
                                    <label for="prix">prix</label>
                                    <input type="number" name="prix" id="prix" class="form-control" placeholder="prix" aria-describedby="helpId" />
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">quantite</label>


                                    <input type="number" name="quantite" id="quantite" class="form-control" placeholder="quantite" aria-describedby="helpId" />


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="categorie">categorie</label>


                                <select class="custom-select" name="categorie" id="categorie">

                                    <option selected disabled>categorie</option>

                                    @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>


                                <textarea class="form-control" name="description" id="description" placeholder="{{ __('Description') }}" cols="30" rows="10"></textarea>


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
