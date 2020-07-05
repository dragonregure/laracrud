<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuestionModel {
    public static function get_all() {
        $questions = DB::table('questions')->get();

        return $questions;
    }

    public static function find_by_id($id) {
        $question = DB::table('questions')->where('id', $id)->first();

        return $question;
    }

    public static function save($data) {
        unset($data['_token']);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $question = DB::table('questions')->insert($data);

        return $question;
    }

    public static function update($id, $request) {
        $question = DB::table('questions')
            ->where('id', $id)
            ->update([
                'title' => $request['title'],
                'content' => $request['content'],
                'created_by' => $request['created_by'],
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return $question;
    }

    public static function destroy($id) {
        $question = DB::table('questions')->where('id', $id)->delete();

        return $question;
    }
}
