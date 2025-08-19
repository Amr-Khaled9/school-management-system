<?php

namespace App\Repository;

use App\Models\Question;
//"title" => "asdfdsa"
//  "answers" => "asfdsgdfgdfg"
//  "right_answer" => "asfdfsdgdfgdfgdfg"
//  "quizze_id" => "2"
//  "score" => "15"
class QuestionRepository implements QuestionRepositoryInterface
{

public function store($request)
{
    $question = new Question();
    $question->title =$request->title;
    $question->answers =$request->answers;
    $question->right_answer =$request->right_answer;
    $question->quizze_id =$request->quizze_id;
    $question->score =$request->score;
    $question->save();
}

public function update($request){
    $question = Question::findOrFail($request->id);
    $question->title =$request->title;
    $question->answers =$request->answers;
    $question->right_answer =$request->right_answer;
    $question->quizze_id =$request->quizze_id;
    $question->score =$request->score;
    $question->save();
}

}
