@extends('layouts.admin.app')

@section('title')
    Create ClassRoom
@endsection

@section('content')
    <div class="wrapper">


        <div id="main">

            <div class="container">


                <div class="dt-sc-titled-box my-4">
                    <h4 class="dt-sc-titled-box-title"> Create ClassRoom </h4>
                    <div class="dt-sc-titled-box-content">
                        <form action="{{ route('admin.classrooms.store') }}" method="POST"
                            class="d-flex flex-column align-items-center">
                            @csrf
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="name" class="pr-1">Name: </label>
                                <input type="text" name="name">
                            </div>

                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="description" class="pr-1">Description: </label>
                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                            </div>

                            @error('open_at')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="open_at" class="pr-1">Open at: </label>
                                <input type="datetime" name="open_at">
                            </div>

                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-set d-flex justify-content-center align-items-center">
                                <label for="status" class="pr-1">Status: </label>
                                <select name="status">
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>

                            <p class="mt-1">Teachers:</p>
                            <ul class="dt-sc-fancy-list burnt-orange">
                                @foreach ($teachers as $teacher)
                                    <li>
                                        <input value="{{ $teacher->id }}" name="teachers[]" class="mr-1"
                                            type="checkbox"><span>{{ $teacher->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
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
