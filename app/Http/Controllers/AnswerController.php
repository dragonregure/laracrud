<?php

namespace App\Http\Controllers;

use App\Models\AnswerModel;
use App\Models\QuestionModel;
use DateTime;
use Illuminate\Http\Request;

class AnswerController extends Controller{
    public function index($id) {
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
        }

        return view('pages.answer.detail', compact('question', 'answers'));
    }

    public function store(Request $request, $id) {
        $save = AnswerModel::save($request->input());
        return redirect('/pertanyaan/' . $id);
    }
}
