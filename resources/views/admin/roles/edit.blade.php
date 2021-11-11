@extends('layouts.app')

@section('title')
    Edit Role '{{ $role->name }}'
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Edit Roles '{{ $role->name }}'</h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            @method('PUT')
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">Name: </label>
                                <input value='{{ $role->name }}' type="text" name="name">
                            </div>

                            <p class="mt-1">Roles:</p>

                            @php
                                //  Convert role permissions to permission ID list
                                $rolePermissionIds = Arr::pluck($rolePermissions, 'id');
                            @endphp

                            <ul class="dt-sc-fancy-list burnt-orange">
                                @foreach ($permissions as $permission)

                                    @php
                                        // Check permision is include
                                        $checked = in_array($permission->id, $rolePermissionIds);
                                    @endphp

                                    <li>
                                        <input @if ($checked) checked  @endif value="{{ $permission->id }}" name="permissions[]"
                                            class="mr-1" type="checkbox"><span>{{ $permission->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @error('permissions')
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
