<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class AnswerModel {
    public static function get_by_id($id) {
        $answers = DB::table('answers')->where('question_id', $id)->get();

        return $answers;
    }

    public static function save($data) {
        unset($data['_token']);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $answer = DB::table('answers')->insert($data);

        return $answer;
    }
}
