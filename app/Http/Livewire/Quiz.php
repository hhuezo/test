<?php

namespace App\Http\Livewire;

use App\Models\Quiz\Answer;
use App\Models\Quiz\Question;
use App\Models\Quiz\Quiz as QuizModel;
use Livewire\Component;

class Quiz extends Component
{
    public $Quiz_id, $Quiz,$Quiz_name, $question, $question_id, $answer_id, $questions, $answers, $answer, $show_questions = 1;

    public function mount($id)
    {
        $this->Quiz_id = $id;
        $this->Quiz = QuizModel::findOrFail($this->Quiz_id);
        $this->Quiz_name = $this->Quiz->name_es;
    }

    public function render()
    {
        $this->Quiz = QuizModel::findOrFail($this->Quiz_id);
        $this->questions = $this->Quiz->Quiz_has_question;

        $this->answers = Answer::get();
        return view('livewire.Quiz');
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

        $question->question_has_Quiz()->attach($this->Quiz_id);
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

    public function modal_edit_question($id, $description)
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

    public function answer_correct($id)
    {
        $answer = Answer::findOrFail($id);
        Answer::where('catalog_questions_id', '=', $answer->catalog_questions_id)->update(['correct_answer' => 0,]);

        $answer->correct_answer = 1;
        $answer->update();
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
    public function edit_Quiz()
    {
        $Quiz = QuizModel::findOrFail($this->Quiz_id);

        $Quiz->name_es = $this->Quiz_name;
        $Quiz->name_en = $this->Quiz_name;
        $Quiz->save();
        $this->dispatchBrowserEvent('close-modal-edit-Quiz');
    }


}
