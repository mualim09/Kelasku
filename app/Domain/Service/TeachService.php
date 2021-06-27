<?php

namespace App\Domain\Service;

use App\domain\dao\TeachDAO;
use Illuminate\Http\Request;

class TeachService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TeachDAO();
    }

    public function create(Request $req)
    {
        $this->dao->create($req);
    }

    public function getAll()
    {
        return $this->dao->findAll();
    }

    public function unenrollClassroom($classroom_id)
    {
        $this->dao->unenrollClassroom($classroom_id);
    }
}
