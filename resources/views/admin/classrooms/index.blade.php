@extends('layouts.admin.app')

@section('title')
    All Class Rooms
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

                <div class="d-flex flex-row-reverse mt-1">
                    <a href="{{ route('admin.classrooms.create') }}" class="ml-auto dt-sc-button small"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        New Class Room</a>
                </div>

                <table class="table table-striped mt-1">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Description</th>
                            <th class="text-center" scope="col">Teachers</th>
                            <th class="text-center" scope="col">Open At</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Created At</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classRooms as $classRoom)
                            @php
                                $teacherNameArr = Arr::pluck($classRoom['teachers'], 'name');
                                $teacherNames = implode(', ', $teacherNameArr);
                            @endphp
                            <tr>
                                <th class="text-center" scope="row">{{ $classRoom['id'] }}</th>
                                <td>{{ $classRoom['name'] }}</td>
                                <td>{{ Str::limit($classRoom['description'], 20) }}</td>
                                <td>{{ $teacherNames }}</td>
                                <td>{{ date_format(date_create($classRoom['open_at']), 'd/m/Y') }}</td>
                                <td>{{ $classRoom['status'] }}</td>
                                <td>{{ date_format(date_create($classRoom['created_at']), 'd/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.classrooms.edit', $classRoom['id']) }}"
                                        class="dt-sc-button small">
                                        <i class="fa fa-edit"></i> Edit</a>
                                    <form class="d-inline-block"
                                        action="{{ route('admin.classrooms.destroy', $classRoom['id']) }}" method="POST">
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
