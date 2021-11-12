@extends('layouts.app')

@section('title')
    All Users
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">

                <div class="message mt-3 d-flex justify-content-center">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <table class="table table-striped mt-1">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Roles</th>
                            <th class="text-center" scope="col">Created At</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $roleNameArr = Arr::pluck($user->roles, 'name');
                                $roleNames = implode(', ', $roleNameArr);
                            @endphp
                            <tr>
                                <th class="text-center" scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $roleNames }}</td>
                                <td>{{ $user->created_at->format('d/m/Y - h:m:s A') }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="dt-sc-button small">
                                        <i class="fa fa-edit"></i> Edit</a>
                                    <form class="d-inline-block" action="{{ route('admin.users.destroy', $user->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="#" onclick="this.parentNode.submit()" class="dt-sc-button small red"><i
                                                class="fa fa-trash" aria-hidden="true"></i>
                                            Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>

        </div>



    </div>


@endsection
