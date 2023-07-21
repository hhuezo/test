<?php

namespace App\Http\Livewire;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Livewire\Component;

class Quiz extends Component
{
    public $question,$question_id, $preguntas,$respuestas,$response;

    public function render()
    {
        $this->preguntas = Pregunta::get();
        $this->respuestas = Respuesta::get();
        return view('livewire.quiz');
    }

    public function save_question()
    {
        $messages = [
            'question.required' => 'La pregunta es requerida'
        ];
        $validatedData = $this->validate([
            'question' => 'required',
        ], $messages);

        $pregunta = new Pregunta();
        $pregunta->descripcion = $this->question;
        $pregunta->save();
        $this->question = "";
    }



    public function save_response()
    {
        $messages = [
            'response.required' => 'La respuesta es requerida'
        ];
        $validatedData = $this->validate([
            'response' => 'required',
        ], $messages);

        $respuesta = new Respuesta();
        $respuesta->descripcion = $this->response;
        $respuesta->pregunta_id = $this->question_id;
        $respuesta->save();
        $this->response = "";
        $this->dispatchBrowserEvent('close-modal');
    }




    public function modal_response($id)
    {
        $this->question_id = $id;
    }

    public function delete_response($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->delete();
    }
}
