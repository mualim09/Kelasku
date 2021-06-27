<?php

namespace App\domain\dao;

use App\domain\entity\Teach;
use Illuminate\Support\Facades\DB;

class TeachDAO
{
    public function findAll($id)
    {
        return Teach::where('teaches.teacher_id', $id)
            ->join('users', 'teaches.teacher_id', '=', 'users.id')
            ->join('classrooms', 'teaches.classroom_id', '=', 'classrooms.id')
            ->get();
    }

    public function unenrollClassroom($classroom_id)
    {
        DB::table('teaches')->where('classroom_id', $classroom_id)->delete();
    }
}
