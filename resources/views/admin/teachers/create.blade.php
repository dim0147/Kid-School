@extends('layouts.admin.app')

@section('title')
    Create Teacher
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Create Teacher </h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.teachers.store') }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">Name: </label>
                                <input type="text" name="name">
                            </div>

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="email" class="pr-1">Email: </label>
                                <input type="email" name="email">
                            </div>

                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="password" class="pr-1">Password: </label>
                                <input type="password" name="password">
                            </div>

                            @error('teachers')
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
