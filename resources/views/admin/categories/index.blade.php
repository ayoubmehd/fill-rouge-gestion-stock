@extends('layouts.admin')

@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">

            <div class="dashboard__wrap">
                <h1 class="mb-0">
                    Categories
                </h1>
            </div>
        </div>

    </section>

    <section class="my-3 heading dashboard__container">
        <div class="container d-flex justify-content-center">
            <div class="dashboard__wrap justify-content-center">
                <div class="card w-100">

                    <div class="card-header">
                        <h2>{{__('Create A new Categorie')}}</h2>
                    </div>

                    <div class="card-body">
                        <form class="w-100" method="post" action="{{ route('admin.categories.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8 mb-0">
                                    <input type="text" name="label" id="label" class="form-control d-block h-100" placeholder="Name" aria-describedby="helpId" />

                                </div>
                                <div class="col">
                                    <button name="" id="" class="btn text-white btn-primary btn-block h-100">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">
            <div class="dashboard__wrap justify-content-center">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Label</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)


                        <tr>
                            <td>{{ $categorie->label }}</td>

                            <td>
                                <a href="{{  route('admin.categories.edit', $categorie) }}" class="btn btn-success btn-circle btn-sm">

                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form class="d-inline" method="post" action="{{  route('admin.categories.destroy', $categorie) }}">
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

                {{ $categories->links() }}

            </div>

        </div>

    </section>

    <div>

    </div>
</div>
@endsection
