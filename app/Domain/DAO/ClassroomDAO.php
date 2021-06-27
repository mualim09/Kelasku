<?php

namespace App\domain\dao;

use App\domain\entity\Teach;
use App\domain\entity\Take;
use App\domain\entity\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ClassroomDao
{
    public function create(Request $req)
    {
        $classroom_id   = Str::uuid();

        if ($req->create) {
            $classroom             = new Classroom();
            $classroom->id         = $classroom_id;
            $classroom->code       = Str::random(7);
            $classroom->name       = $req->classroom_name;
            $classroom->created_at = date('Y-m-d H:i:s');

            $classroom->save();
        }

        if ($req->teach) {
            $teach               = new Teach();
            $teach->id           = Str::uuid();
            $teach->teacher_id   = $req->teacher_id;
            $teach->classroom_id = $classroom_id;
            $teach->created_at   = date('Y-m-d H:i:s');

            $teach->save();
        }
    }

    public function findAll()
    {
        return Classroom::all();
    }

    public function getClassroom($id)
    {
        return DB::table('classrooms')->where('id', $id)->get();
    }

    public function getAnnouncements($id)
    {
        return DB::table('announcements')->where('classroom_id', $id)->get();
    }

    public function getMaterial($id)
    {
        return DB::table('materials')->where('classroom_id', $id)->get();
    }


    public function getAssignment($id)
    {
        return DB::table('assignments')->where('classroom_id', $id)->get();
    }

    public function getComment($id)
    {
        return DB::table('comments')->where('classwork_id', $id)->get();
    }

    public function getTeacherMember($id)
    {
        return Teach::where('teaches.classroom_id', $id)
            ->join('classrooms', 'teaches.classroom_id', '=', 'classrooms.id')
            ->join('users', 'teaches.teacher_id', '=', 'users.id')
            ->get();
    }

    public function getStudentMember($id)
    {
        return Take::where('takes.classroom_id', $id)
            ->join('classrooms', 'takes.classroom_id', '=', 'classrooms.id')
            ->join('users', 'takes.student_id', '=', 'users.id')
            ->get();
    }

    public function deleteMember($member_id)
    {
        DB::table('takes')->where('student_id', $member_id)->delete();
    }
}
