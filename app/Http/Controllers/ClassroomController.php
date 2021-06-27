<?php

namespace App\Http\Controllers;

use App\Domain\Service\ClassroomService;
use App\Domain\Service\AnnouncementService;
use App\Domain\Service\CommentService;
use App\Domain\Service\MarkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder\Class_;

class ClassroomController extends Controller
{
    public function showClassroom(Request $req)
    {
        $classroom_service = new ClassroomService();

        $classroom       = $classroom_service->getClassroom($req->classroom_id);
        $announcement    = $classroom_service->getAnnouncements($req->classroom_id);
        $post_material   = $classroom_service->getMaterial($req->classroom_id);
        $post_assignment = $classroom_service->getAssignment($req->classroom_id);

        if ($req->role == 'teacher') {
            return view(
                'teacher.index',
                [
                    'classroom' => $classroom,
                    'announcement' => $announcement,
                    'post_material' => $post_material,
                    'post_assignment' => $post_assignment
                ]
            );
        }

        return view(
            'student.index',
            [
                'classroom' => $classroom,
                'announcement' => $announcement,
                'post_material' => $post_material,
                'post_assignment' => $post_assignment
            ]
        );
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'classroom_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }

        $classroom_service = new ClassroomService();
        $classroom_service->create($req);

        return redirect('/')->with('success', 'Class Created');
    }

    public function showClasswork(Request $req)
    {
        $classroom_service = new ClassroomService();

        $classroom       = $classroom_service->getClassroom($req->classroom_id);
        $post_material   = $classroom_service->getMaterial($req->classroom_id);
        $post_assignment = $classroom_service->getAssignment($req->classroom_id);

        if ($req->role == 'teacher') {
            return view(
                'teacher.classwork',
                [
                    'classroom'       => $classroom,
                    'post_material'   => $post_material,
                    'post_assignment' => $post_assignment
                ]
            );
        }

        return view(
            'student.classwork',
            [
                'classroom'       => $classroom_service->getClassroom($req->classroom_id),
                'post_material'   => $post_material,
                'post_assignment' => $post_assignment
            ]
        );
    }

    public function showMember(Request $req)
    {
        $classroom_service = new ClassroomService();

        if ($req->role == 'teacher') {
            return view(
                'teacher.member',
                [
                    'classroom' => $classroom_service->getClassroom($req->classroom_id),
                    'teacher'   => $classroom_service->getTeacherMember($req->classroom_id),
                    'students'  => $classroom_service->getStudentMember($req->classroom_id)
                ]
            );
        }

        return view(
            'student.member',
            [
                'classroom' => $classroom_service->getClassroom($req->classroom_id),
                'teacher'   => $classroom_service->getTeacherMember($req->classroom_id),
                'students'  => $classroom_service->getStudentMember($req->classroom_id)
            ]
        );
    }

    public function deleteMember(Request $req)
    {
        $member = new ClassroomService();

        $member->deleteMember($req->id);

        return redirect()->back();
    }

    public function showMark(Request $req)
    {
        $classroom_service = new ClassroomService();
        $marks = DB::table('marks')
            ->join('users','marks.student_id','=','users.id')
            ->join('assignments','marks.assignment_id','=','assignments.id')
            ->join('classrooms','marks.classroom_id','=','classrooms.id')
            ->get()
            ->groupBy('student_id');
        return view('teacher.mark', ['classroom' => $classroom_service->getClassroom($req->classroom_id),
            'marks' => $marks
        ]);
    }

    public function showCreateMaterial(Request $req)
    {
        $classroom_service = new ClassroomService();

        return view('teacher.create_material', ['classroom' => $classroom_service->getClassroom($req->classroom_id)]);
    }

    public function showCreateAssignment(Request $req)
    {
        $classroom_service = new ClassroomService();

        return view('teacher.create_assignment', ['classroom' => $classroom_service->getClassroom($req->classroom_id)]);
    }

    public function showMaterial(Request $req)
    {
        $classroom_service = new ClassroomService();
        $post_material = DB::table('materials')->where('classroom_id', $req->classroom_id)->get();
        $comment = DB::table('comments')->where('classwork_id', $req->material_id)->get();

        if ($req->role == 'teacher') {
            return view(
                'teacher.material',
                [
                    'classroom' => $classroom_service->getClassroom($req->classroom_id),
                    'post_material' => $post_material,
                    'comment' => $comment
                ]
            );
        }

        return view(
            'student.material',
            [
                'classroom' => $classroom_service->getClassroom($req->classroom_id),
                'post_material' => $post_material,
                'comment' => $comment
            ]
        );
    }

    public function showAssignment(Request $req)
    {
        $classroom_service = new ClassroomService();

        $classroom       = $classroom_service->getClassroom($req->classroom_id);
        $post_assignment = $classroom_service->getAssignment($req->classroom_id);
        $comment         = $classroom_service->getComment($req->assignment_id);

        if ($req->role == 'teacher') {
            return view(
                'teacher.assignment',
                [
                    'classroom'       => $classroom,
                    'post_assignment' => $post_assignment,
                    'comment'         => $comment
                ]
            );
        }

        return view(
            'student.assignment',
            [
                'classroom'       => $classroom,
                'post_assignment' => $post_assignment,
                'comment'         => $comment
            ]
        );
    }

    public function insert_to_announce(Request $req)
    {
        $svc = new AnnouncementService();
        $svc->create_ann($req);

        return redirect()->back();
    }

    public function postCommentMaterial(Request $req)
    {
        $svc = new CommentService();
        $svc->create_comment_material($req);

        return redirect()->back();
    }

    public function postCommentAssignment(Request $req)
    {
        $svc = new CommentService();
        $svc->create_comment_assignment($req);

        return redirect()->back();
    }

    public function turn_in(Request $req){
        $validator = Validator::make($req->all(),[
            'file'=> 'max:255'
        ]);
        
        $svc = new MarkService();
        $svc->create($req);
        return redirect('/')->with('success', 'Assignment Created');
    }
}
