<?php

namespace App\domain\service;

use App\domain\entity\Assignment;
use App\domain\dao\AssignmentDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentService{
    private $dao;

    public function __construct() {
        $this->dao = new AssignmentDAO();
    }

    public function create(Request $req){
        $this->dao->create($req);
    }
}