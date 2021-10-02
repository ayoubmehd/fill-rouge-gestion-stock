@extends('layouts.app')

@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="container d-flex justify-content-center">

            <div class="dashboard__wrap">
                <h1 class="mb-0">
                    Edit {{ $categorie->label }}
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



                        <form class="w-100" method="post" action="{{ route('admin.categories.update', $categorie) }}">


                            @method('PATCH')

                            @csrf
                            <div class="row">
                                <div class="form-group col-8 mb-0">
                                    <input value="{{$categorie->label}}" type="text" name="label" id="label" class="form-control d-block h-100" placeholder="{{ __('admin.produits.form.name.lable') }}" aria-describedby="helpId" />


                                </div>
                                <div class="col">
                                    <button name="" id="" class="btn text-white btn-primary btn-block  h-100">Save</button>
                                </div>
                            </div>
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
