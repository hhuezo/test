<?php

namespace App\Http\Livewire;

use App\Models\FileCourse;
use App\Models\SectionCourse;
use Livewire\Component;
use Livewire\WithFileUploads;

class Section extends Component
{
    use WithFileUploads;
    public $course_id, $description, $sections, $tab = 0, $archivos = [], $section_id, $files;

    public function mount($id)
    {
        $this->course_id = $id;
    }

    public function change_tab($num)
    {
        $this->tab = $num;
    }

    public function render()
    {
        $this->sections = SectionCourse::where('course_id', '=', $this->course_id)->get();
        $this->files = FileCourse::where('course_id', '=', $this->course_id)->get();
        return view('livewire.section');
    }

    public function save_section()
    {
        $section = new SectionCourse();
        $section->description = $this->description;
        $section->course_id = $this->course_id;
        $section->save();
        $this->description = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function save_file($id)
    {

        foreach ($this->archivos as $key => $file) {
            $filename = $file->getClientOriginalName();
            $path = uniqid() . $filename;
            $destinationPath = public_path('/files');
            //$file->move($destinationPath, $path);
            $file->storeAs('evidences', $path, 'real_public');

            $file_course = new FileCourse();
            $file_course->course_id = $this->course_id;
            $file_course->section_id = $id;
            $file_course->name = $filename;
            $file_course->route = $path;

            $file_course->save();
        }
    }
}
