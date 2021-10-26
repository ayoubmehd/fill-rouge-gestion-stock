@extends('layouts.admin')


@section('content')

<div class="mt-5">
    <section class="heading dashboard__container">
        <div class="dashboard__wrap">
            <h1 class="mb-0">
                Users
            </h1>
            <a class="btn btn-primary btn-lg rounded-circle d-inline-flex justify-content-center align-items-center dashboard__new-btn" href="{{ route('admin.users.create') }}" style="height: 75px; width: 75px;">

                <i class="mdi mdi-plus"></i>
            </a>
        </div>
    </section>

    <section class="my-3 heading dashboard__container">
        <div class="dashboard__wrap flex-column">
        </div>
    </section>

    <section class="heading dashboard__container">
        <div class="dashboard__wrap justify-content-center">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->name }}</th>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{  route('admin.users.edit', $user) }}" class="btn btn-success btn-circle btn-sm">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form class="d-inline" method="post" action="{{  route('admin.users.destroy', $user) }}">
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

            {{ $users->links() }}

        </div>
    </section>

    <div>

    </div>
</div>
@endsection
