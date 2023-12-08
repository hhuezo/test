<?php

namespace App\Http\Livewire;

use App\Models\administracion\AsistenciaSesion;
use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\administracion\Sesion;
use App\Models\administracion\SesionDetalle;
use App\Models\catalog\StudyPlanDetail;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddSesion extends Component
{
    public $plan_id, $plan, $sesiones, $cursos, $cursos_en_sesion = [], $arrayCursos = [],$cursos_en_plan = [], $session_name, $meeting_date,$notas_sobre_sesion;

    public function mount($plan_id)
    {
        $this->plan_id = $plan_id;
        $this->plan = IglesiaPlanEstudio::findOrFail($plan_id);
        $this->sesiones = Sesion::where('group_per_church_id', '=', $this->plan->id)->get();

        $this->cursos_en_plan = DB::table('session_per_group_detail AS spgd')
        ->join('sessions AS s', 'spgd.session_id', '=', 's.id')
        ->select('spgd.course_id')
        ->where('s.group_per_church_id', '=', $plan_id)
        ->pluck('spgd.course_id')->toArray();

    }

    public function render()
    {
        if (empty($this->arrayCursos)) {
            $this->cursos = StudyPlanDetail::where('study_plan_id', '=', $this->plan->study_plan_id)->whereNotIn('course_id', $this->cursos_en_plan)->get();
            $this->cursos_en_sesion = [];
        } else {
            $this->cursos_en_sesion = StudyPlanDetail::where('study_plan_id', '=', $this->plan->study_plan_id)->whereIn('course_id', $this->arrayCursos)->get();
            $this->cursos = StudyPlanDetail::where('study_plan_id', '=', $this->plan->study_plan_id)->whereNotIn('course_id', $this->arrayCursos)->whereNotIn('course_id', $this->cursos_en_plan)->get();
        }
        return view('livewire.add-sesion');
    }


    public function addTema($id)
    {
        array_push($this->arrayCursos, $id);
    }

    public function delTema($id)
    {
        $index = array_search($id, $this->arrayCursos);
        if ($index !== false) {
            unset($this->arrayCursos[$index]);
        }
    }


    public function saveData()
    {
        $messages = [
            'session_name.required' => 'El nombre es un valor requerido',
            'meeting_date.required' => 'La fecha es un valor requerido',
            'arrayCursos.required' => 'Los cursos  son un valor requerido',
        ];

        $validatedData = $this->validate([
            'session_name' => 'required',
            'meeting_date' => 'required',
            'arrayCursos' => 'required|array|min:1',
        ], $messages);


        $sesion = new Sesion();
        $sesion->group_per_church_id = $this->plan_id;
        $sesion->session_name =  $this->session_name;
        $sesion->meeting_date =  $this->meeting_date;
        $sesion->notas_sobre_sesion =  $this->notas_sobre_sesion;

        $sesion->save();

        foreach ($this->arrayCursos as $curso) {
            $detalle = new SesionDetalle();
            $detalle->session_id = $sesion->id;
            $detalle->course_id = $curso;
            $detalle->save();
        }

        $participantes = $this->plan->iglesia->participantes($this->plan->iglesia_id)->where('group_id', '=', $this->plan->group_id)->where('status_id', '=', 2);

        foreach($participantes as $participante)
        {
            $asistencia = new AsistenciaSesion();
            $asistencia->sessions_id = $sesion->id;
            $asistencia->member_id = $participante->id;
            $asistencia->save();
        }



        $this->dispatchBrowserEvent('message-success');

        return redirect('administracion/iglesia_plan_estudio/' . $this->plan_id);

    }
}
