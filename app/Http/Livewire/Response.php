<?php

namespace App\Http\Livewire;

use App\Models\Respuesta;
use Livewire\Component;

class Response extends Component
{
    public $response;
    public function render()
    {
        return view('livewire.response');
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
        $respuesta->pregunta_id = 3;
        $respuesta->save();
        $this->response = "";
    }
}
