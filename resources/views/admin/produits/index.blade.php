@extends('layouts.app')

@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">

            <div class="dashboard__wrap">
                <h1 class="mb-0">
                    Users
                </h1>
                <a class="btn btn-primary btn-lg rounded-circle d-inline-flex justify-content-center align-items-center dashboard__new-btn" href="{{ route('admin.produits.create') }}" style="height: 75px; width: 75px;">
                    <i class="mdi mdi-plus"></i>
                </a>
            </div>
        </div>

    </section>

    <section class="my-3 heading dashboard__container">
        <div class="dashboard__wrap flex-column">
        </div>
    </section>

    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">
            <div class="dashboard__wrap w-100 justify-content-center">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)


                        <tr>
                            <th>{{ $produit->name }}</th>

                            <td>{{ $produit->prix }}</td>
                            <td>{{ Str::limit($produit->description, 30, '...') }}</td>
                            <td>{{ $produit->quantite }}</td>
                            <td>{{ $produit->categorie->label }}</td>

                            <td>
                                <a href="{{  route('admin.produits.edit', $produit) }}" class="btn btn-success btn-circle btn-sm">

                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{  route('admin.produits.destroy', $produit) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button href="" class="btn btn-danger btn-circle btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produits->links() }}

            </div>

        </div>

    </section>

    <div>

    </div>
</div>
@endsection
