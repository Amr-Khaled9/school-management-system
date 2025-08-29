<?php

namespace App\Livewire;

use App\Models\Degree;
use Livewire\Component;
use App\Models\Question;

class ShowQuestion extends Component
{
    public $student_id;
    public $quizze_id;
    public $data;
    public $counter = 0;
    public $score = 0;
    public $questioncount = 0;

    public function nextQuestion($question_id, $score, $answer, $right_answer)
    {
        $stuDegree = Degree::where('student_id', $this->student_id)
            ->where('quizze_id', $this->quizze_id)
            ->first();

        // insert
        if ($stuDegree == null) {
            $degree = new Degree();
            $degree->quizze_id = $this->quizze_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            $degree->score = 0;

            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += (int) $score;
            }

            $degree->date = date('Y-m-d');
            $degree->save();

        } else {
            // check abuse
            if ($stuDegree->question_id >= $this->data[$this->counter]->id) {
                $stuDegree->score = 0;
                $stuDegree->abuse = '1';
                $stuDegree->save();
                toastr()->error('تم إلغاء الاختبار لإكتشاف تلاعب بالنظام');
                return redirect('/student/exams');
            } else {
                $stuDegree->question_id = $question_id;

                if (strcmp(trim($answer), trim($right_answer)) === 0) {
                    $stuDegree->score += (int) $score;
                }

                $stuDegree->save();
            }
        }

        //   التنقل بين الأسئلة
        if ($this->counter < $this->questioncount - 1) {
            $this->counter++;
        } else {
            toastr()->success('تم إجراء الاختبار بنجاح');
            return redirect('/student/exams');
        }
    }

    public function render()
    {
        $this->data = Question::where('quizze_id', $this->quizze_id)->orderBy('id')->get();
        $this->questioncount = $this->data->count();

        return view('livewire.show-question', [
            'data' => $this->data,
        ]);
    }
}
