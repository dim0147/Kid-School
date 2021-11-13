<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = ClassRoom::with('teachers')->get()->toArray();

        return view('admin.classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::query()->role('teacher')->get();

        return view('admin.classrooms.create', compact('teachers'));
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
            'name' => 'required|string|unique:class_rooms,name',
            'description' => 'required|string',
            'open_at' => 'required|date',
            'status' => 'required|in:open,close',
            'teachers' => 'array',
            'img' => 'required|image',
        ]);

        $request->img->store(Config::get('custom.img_path.storage.class_room'));

        $imgName = $request->img->hashName();

        $classroom = new ClassRoom;

        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->open_at = $request->open_at;
        $classroom->status = $request->status;
        $classroom->img = $imgName;

        $classroom->save();

        if ($request->teachers != null) {
            $classroom->teachers()->attach($request->teachers);
        }

        return back()->with('success', 'Create classroom success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classroom)
    {
        $teachers = User::role('teacher')->get();
        $classroom->load('teachers');
        $classroom = $classroom->toArray();

        return view('admin.classrooms.edit', compact('teachers', 'classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classroom)
    {
        $request->validate([
            'name' => 'required|string|unique:class_rooms,name,' . $classroom->id,
            'description' => 'required|string',
            'open_at' => 'required|date',
            'status' => 'required|in:open,close',
            'teachers' => 'array',
            'img' => 'image',
        ]);



        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->open_at = $request->open_at;
        $classroom->status = $request->status;

        if ($request->img != null) {

            $request->img->store(Config::get('custom.img_path.storage.class_room'));

            $classroom->img = $request->img->hashName();
        }

        $classroom->teachers()->detach();

        if ($request->teachers != null) {
            $classroom->teachers()->attach($request->teachers);
        }

        $classroom->save();

        return back()->with('success', 'Edit classroom successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classroom)
    {
        $classroom->delete();

        return back()->with('success', 'Delete classroom successfully');
    }
}
