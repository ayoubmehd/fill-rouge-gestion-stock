@extends('layouts.app')

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
                            <label for="username">{{ __('admin.users.fome.username.lable') }}</label>
                            <input type="text" name="name" id="username" class="form-control" placeholder="{{ __('admin.users.form.username.lable') }}" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">{{ __('admin.users.form.username.help') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="role">{{ __('admin.users.form.role.lable') }}</label>
                            <select class="custom-select" name="role" id="role">
                                <option selected>{{ __('admin.users.form.role.placeholder') }}</option>
                                <option value="admin">Admin</option>
                                <option value="livreur">Livreur</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('admin.users.form.password.lable') }}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('admin.users.form.password.lable') }}" aria-describedby="password">
                            <small id="password" class="text-muted">{{ __('admin.users.form.password.help') }}</small>
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
