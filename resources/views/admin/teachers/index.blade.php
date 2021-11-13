@extends('layouts.admin.app')

@section('title')
    All Teachers
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
                    <a href="{{ route('admin.teachers.create') }}" class="ml-auto dt-sc-button small"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        New Teacher</a>
                </div>

                <table class="table table-striped mt-1">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Classes</th>
                            <th class="text-center" scope="col">Created At</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            @php
                                $classRoomNameArr = Arr::pluck($teacher['class_rooms'], 'name');
                                $classRoomNames = implode(', ', $classRoomNameArr);
                            @endphp
                            <tr>
                                <th class="text-center" scope="row">{{ $teacher['id'] }}</th>
                                <td>{{ $teacher['name'] }}</td>
                                <td>{{ $teacher['email'] }}</td>
                                <td>{{ $classRoomNames }}</td>
                                <td>{{ date_format(date_create($teacher['created_at']),"Y/m/d H:i:s") }}</td>
                                {{-- <td>{{ date('d/m/Y - h:m:s A', $teacher['created_at']) }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.teachers.edit', $teacher['id']) }}"
                                        class="dt-sc-button small">
                                        <i class="fa fa-edit"></i> Edit</a>
                                    <form class="d-inline-block"
                                        action="{{ route('admin.teachers.destroy', $teacher['id']) }}" method="POST">
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
