<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\FileCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = "";
        if ($request->search) {
            $search = $request->search;
        }
        $courses = Course::where('name', 'like', '%' . $search . '%')->orWhere('name_es', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('description_es', 'like', '%' . $search . '%')->get();
        return view('course.index', compact('courses', 'search'));
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
        $files = FileCourse::where('course_id','=',$id)->get();
        return view('course.edit', compact('course','files'));
    }

    public function upload_file(Request $request)
    {
        $messages = [
            'files.required' => 'Error, no se ha elegido ningun archivo',
            'files.mimetypes' => 'Error, formato no válido',
        ];

        $request->validate([
            'files'=> 'required',
        ], $messages);


        $files = $request->file('files');
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $path = uniqid() . $filename;
            $destinationPath = public_path('/files');
            $file->move($destinationPath, $path);

            $file_course = new FileCourse();
            $file_course->course_id = $request->course_id;
            $file_course->name = $filename;
            $file_course->route = $path;

            $file_course->save();
        }
        alert()->success('Registro guardado correctamente');
        return back();
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
