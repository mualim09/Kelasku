<?php

namespace App\Domain\Service;

use App\domain\dao\ClassroomDAO;
use App\domain\dao\TakeDao;
use App\domain\dao\TeachDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomService
{
    private $dao;

    public function __construct()
    {
        $this->dao      = new ClassroomDao();
        $this->teachDao = new TeachDAO();
        $this->takeDao  = new TakeDao();
    }

    public function create(Request $req)
    {
        $this->dao->create($req);
    }

    public function mergeClassroomTeachAndTake()
    {
        return array_merge($this->teachDao->findAll(Auth::user()->id)->toArray(), $this->takeDao->findAll(Auth::user()->id)->toArray());
    }

    public function getAll()
    {
        return $this->dao->findAll();
    }

    public function getClassroom($req)
    {
        return $this->dao->getClassroom($req);
    }

    public function getAnnouncements($req)
    {
        return $this->dao->getAnnouncements($req);
    }

    public function getMaterial($req)
    {
        return $this->dao->getMaterial($req);
    }

    public function getAssignment($req)
    {
        return $this->dao->getAssignment($req);
    }

    public function getComment($req)
    {
        return $this->dao->getComment($req);
    }

    public function getTeacherMember($req)
    {
        return $this->dao->getTeacherMember($req);
    }

    public function getStudentMember($req)
    {
        return $this->dao->getStudentMember($req);
    }

    public function deleteMember($member_id)
    {
        return $this->dao->deleteMember($member_id);
    }
}
