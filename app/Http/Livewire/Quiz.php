<?php

namespace App\Http\Livewire;

use App\Models\catalog\Answer;
use App\Models\catalog\Question;
use Livewire\Component;

class Quiz extends Component
{
    public $question, $question_id, $answer_id, $questions, $answers, $answer, $show_questions = 1;

    public function render()
    {
        $this->questions = Question::get();
        $this->answers = Answer::get();
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

        $question = new Question();
        $question->description = $this->question;
        $question->save();
        $this->question = "";
        $this->dispatchBrowserEvent('close-modal-answer');
    }



    public function save_answer()
    {
        $messages = [
            'answer.required' => 'La respuesta es requerida'
        ];
        $validatedData = $this->validate([
            'answer' => 'required',
        ], $messages);

        $answer = new Answer();
        $answer->description = $this->answer;
        $answer->catalog_questions_id = $this->question_id;
        $answer->save();
        $this->answer = "";
        $this->dispatchBrowserEvent('close-modal');
    }



    public function show_questions($id)
    {
        $this->show_questions = $id;
    }

    public function modal_edit_question($id,$description)
    {
        $this->question_id = $id;
        $this->question = $description;
    }



    public function edit_question()
    {
        $question = Question::findOrFail($this->question_id);
        $question->description = $this->question;
        $question->update();
        $this->question = "";
        $this->question_id = 0;
        $this->dispatchBrowserEvent('close-modal-edit-question');
    }

    public function modal_answer($id)
    {
        $this->question_id = $id;
    }


    public function modal_delete_answer($id)
    {
        $this->answer_id = $id;
    }

    public function delete_answer()
    {
        $answer = Answer::findOrFail($this->answer_id);
        $answer->delete();
        $this->answer_id = 0;
        $this->dispatchBrowserEvent('close-modal-delete-answer');
    }
}
