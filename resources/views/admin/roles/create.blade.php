@extends('layouts.admin.app')

@section('title')
    Create Role
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Create Roles </h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.roles.store') }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">Name: </label>
                                <input type="text" name="name">
                            </div>

                            <p class="mt-1">Roles:</p>
                            <ul class="dt-sc-fancy-list burnt-orange">
                                @foreach ($permissions as $permission)
                                    <li>
                                        <input value="{{ $permission->id }}" name="permissions[]" class="mr-1"
                                            type="checkbox"><span>{{ $permission->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @error('permissions')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="dt-sc-button medium">Create</button>
                            @if (session('success'))
                                <div class="text-success">{{ session('success') }}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>


@endsection
