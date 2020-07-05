<?php

namespace App\Http\Controllers;

use App\Models\AnswerModel;
use App\Models\QuestionModel;
use DateTime;
use Illuminate\Http\Request;

class QuestionController extends Controller {
    public function index() {
        $questions = QuestionModel::get_all();

        return view('pages.question.home', compact('questions'));
    }

    public function detail($id) {
        $question = QuestionModel::find_by_id($id);
        $answers = AnswerModel::get_by_id($id);

        foreach ($answers as $answer) {
            $date = new DateTime($answer->updated_at);
            $now = new DateTime();
            $diff = $date->diff($now);

            if($diff->format('%d') != 0) $answer->diff = $diff->format('%d days ago');
            else if($diff->format('%h') != 0) $answer->diff = $diff->format('%h hours ago');
            else if($diff->format('%i') != 0) $answer->diff = $diff->format('%i minutes ago');
            else if($diff->format('%s') != 0) $answer->diff = $diff->format('%s seconds ago');
            else  $answer->diff = $diff->format('0 seconds ago');
        }

        return view('pages.answer.detail', compact('question', 'answers'));
    }

    public function create() {
        return view('pages.question.create');
    }

    public function store(Request $request){
        $save = QuestionModel::save($request->input());

        return redirect('/pertanyaan');
    }

    public function edit($id) {
        $question = QuestionModel::find_by_id($id);

        return view('pages.question.edit', compact('question'));
    }

    public function update(Request $request, $id){
        $update = QuestionModel::update($id, $request->input());
        return redirect('/pertanyaan');
    }

    public function destroy($id) {
        $delete = QuestionModel::destroy($id);

        return redirect('/pertanyaan');
    }
}
