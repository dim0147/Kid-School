<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // class_rooms return null if don't have any classrooms so using toArray()
        $teachers =  User::query()->role('teacher')->with('classRooms')->get()->toArray();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $user->assignRole('teacher');

        return back()->with('success', 'Create teacher success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $teacher)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'password' => 'string|nullable',
        ]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;

        if ($request->password != null) {

            $teacher->password = Hash::make($request->password);
        }

        $teacher->save();

        return back()->with('success', 'Edit teacher successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $teacher->delete();

        return back()->with('success', 'Remove teacher successfully');
    }
}
