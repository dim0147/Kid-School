@extends('layouts.admin.app')

@section('title')
    Edit ClassRoom '{{ $classroom['name'] }}''
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Edit ClassRoom </h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.classrooms.update', $classroom['id']) }}" method="POST"
                            class="d-flex flex-column align-items-center" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">c: </label>
                                <input value={{ $classroom['name'] }} type="text" name="name">
                            </div>

                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="description" class="pr-1">Description: </label>
                                <textarea value={{ $classroom['description'] }} name="description" id="" cols="30"
                                    rows="10">{{ $classroom['description'] }}</textarea>
                            </div>

                            @error('open_at')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="open_at" class="pr-1">Open at: </label>
                                <input value={{ $classroom['open_at'] }} type="date" name="open_at">
                            </div>

                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="status" class="pr-1">Status: </label>
                                <select value={{ $classroom['status'] }} name="status">
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>

                            <p class="mt-1">Teachers:</p>

                            @php
                                $classroomTeacherIdArr = Arr::pluck($classroom['teachers'], 'id');
                            @endphp

                            <ul class="dt-sc-fancy-list burnt-orange">
                                @foreach ($teachers as $teacher)
                                    @php
                                        $checked = in_array($teacher->id, $classroomTeacherIdArr) ? 'checked' : '';
                                    @endphp
                                    <li>
                                        <input {{ $checked }} value="{{ $teacher->id }}" name="teachers[]"
                                            class="mr-1" type="checkbox"><span>{{ $teacher->name }}
                                            ({{ $teacher->email }})</span>
                                    </li>
                                @endforeach
                            </ul>
                            @error('teachers')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center mt-1">
                                <label for="img" class="pr-1">Image: </label>
                                <input type="file" name="img" accept="image/*">
                            </div>


                            <div class="w-50">
                                <img src="{{ Utils::getRootImgPath('custom.img_path.public.class_room', $classroom['img']) }}"
                                    alt="" class="w-100">
                            </div>

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
