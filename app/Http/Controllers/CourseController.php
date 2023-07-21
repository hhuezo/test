<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = "";
        if ($request->search) {
            $search = $request->search;
        }
        $courses = Course::where('name','like','%'.$search.'%')->orWhere('name_es','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('description_es','like','%'.$search.'%')->get();
        return view('course.index', compact('courses','search'));
    }


    public function store(Request $request)
    {
        if ($request->image) {
            $doc = $request->file('image');
            $path = uniqid() . $doc->getClientOriginalName();
            $doc->move(public_path("img/"),  $path);


            $course = new Course();
            $course->name = $request->name;
            $course->name_es = $request->name;
            $course->description = $request->description;
            $course->description_es = $request->description;
            $course->image = $path;
            $course->save();
            alert()->success('Registro guardado correctamente');
        } else {
            alert()->error('Registro erroneo');
        }
        return back();
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    public function upload_file(Request $request)
    {
        dd($request->files);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
