<?php

namespace App\Domain\Service;

use App\domain\dao\TakeDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TakeService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TakeDAO();
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
