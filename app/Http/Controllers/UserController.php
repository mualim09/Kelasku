<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\domain\service\ClassroomService;
use App\domain\service\TakeService;
use App\Domain\Service\TeachService;
use App\Domain\Service\UserService;

class UserController extends Controller
{
    public function getAllClassroom()
    {
        $classrooms = new ClassroomService();

        return view(
            '/home',
            [
                'classrooms' => $classrooms->mergeClassroomTeachAndTake()
            ]
        );
    }

    public function setting()
    {
        return view('setting');
    }

    public function createClassroom(Request $req)
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

    public function joinClassroom(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'classroom_code' => 'required|max:7',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }

        $take_service = new TakeService();
        $take_service->create($req);

        return redirect('/')->with('success', 'Join Successfully');
    }

    public function unenrollClassroom(Request $req)
    {
        $classroom = explode(',', $req->classroom_id);

        if ($classroom[0] == 'teacher') {
            $classroom_teach = new TeachService();

            $classroom_teach->unenrollClassroom($classroom[1]);
        } else {
            $classroom_take  = new TakeService();

            $classroom_take->unenrollClassroom($classroom[1]);
        }

        return redirect()->back();
    }

    public function editProfile(Request $req)
    {
        $user_service = new UserService();
        $user_service->editProfile($req);

        return redirect()->back();
    }
}
