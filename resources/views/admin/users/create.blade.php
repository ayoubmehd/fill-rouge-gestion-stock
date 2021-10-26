@extends('layouts.admin')


@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="dashboard__wrap">
            <h1 class="mb-0">
                Create a New User
            </h1>
        </div>
    </section>

    <section class="my-3 heading dashboard__container">
        <div class="dashboard__wrap flex-column">
        </div>
    </section>

    <section class="heading dashboard__container">
        <div class="dashboard__wrap justify-content-center align-items-stretch">

            <div class="card w-100">
                <div class="card-body">

                    <form method="post" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" name="name" id="username" class="form-control" placeholder="username" aria-describedby="helpId">


                        </div>

                        <div class="form-group">
                            <label for="role">role</label>

                            <select class="custom-select" name="role" id="role">
                                <option selected>role</option>
                                <option value="admin">Admin</option>
                                <option value="livreur">Livreur</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>

                            <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="password">

                        </div>

                        <button name="" id="" class="btn text-white btn-primary btn-lg">Save</button>


                    </form>

                </div>
            </div>

        </div>
    </section>

    <div>

    </div>
</div>
@endsection
