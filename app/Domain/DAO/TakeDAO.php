<?php

namespace App\domain\dao;

use App\domain\entity\Take;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TakeDao
{
    public function create(Request $req)
    {
        $take               = new Take();
        $take->id           = Str::uuid();
        $take->student_id   = $req->student_id;
        $take->classroom_id = DB::table('classrooms')->where('code', $req->classroom_code)->first()->id;
        $take->created_at   = date('Y-m-d H:i:s');

        $take->save();
    }

    public function findAll($id)
    {
        return Take::where('takes.student_id', $id)
            ->join('users', 'takes.student_id', '=', 'users.id')
            ->join('classrooms', 'takes.classroom_id', '=', 'classrooms.id')
            ->get();
    }

    public function unenrollClassroom($classroom_id)
    {
        DB::table('takes')->where('classroom_id', $classroom_id)->delete();
    }
}
