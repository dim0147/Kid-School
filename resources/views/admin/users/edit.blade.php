@extends('layouts.admin.app')

@section('title')
    Edit User '{{ $user->name }}'
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Edit User '{{ $user->name }}'</h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            @method('PUT')

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">Name: </label>
                                <input value='{{ $user->name }}' type="text" name="name">
                            </div>

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="email" class="pr-1">Email: </label>
                                <input value='{{ old('email') ?? $user->email }}' type="email" name="email">
                            </div>

                            <p class="mt-1">Roles:</p>

                            @php
                                //  Convert role array to role ID array
                                $userRoleIds = Arr::pluck($user->roles, 'id');
                            @endphp

                            <ul class="dt-sc-fancy-list burnt-orange">
                                @foreach ($roles as $role)

                                    @php
                                        // Check permision is include
                                        $checked = in_array($role->id, $userRoleIds);
                                    @endphp

                                    <li>
                                        <input @if ($checked) checked  @endif value="{{ $role->id }}" name="roles[]"
                                            class="mr-1" type="checkbox"><span>{{ $role->name }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            @error('roles')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="dt-sc-button medium">Save</button>

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
