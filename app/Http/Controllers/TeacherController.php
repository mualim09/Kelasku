<?php

namespace App\Http\Controllers;

use App\Domain\Entity\Material;
use App\Domain\Entity\Assignment;
use App\domain\service\MaterialService;
use App\domain\service\AssignmentService;
use App\domain\service\MarkService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function storeMaterial(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
            'file' => 'max:255'
        ]);
        $material_service = new MaterialService();
        $material_service->create($req);

        return redirect('/')->with('success', 'Material Created');
    }

    public function storeAssignment(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'title' => 'required|max:255',
            'description' => 'max:255',
            'due_date' => 'max:255',
            'maxPoints' => 'required|max:255',
            'file' => 'max:255'
        ]);
        $assignment_service = new AssignmentService();
        $assignment_service->create($req);

        return redirect('/')->with('success', 'Assignment Created');
    }

    public function updatePoint(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'mark_value' => 'max:255'
        ]);

        $svc = new MarkService();
        $svc->update($req);

        return redirect('/')->with('success', 'Assignment Created');
    }
}
