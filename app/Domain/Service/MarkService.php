<?php

namespace App\domain\service;

use App\domain\entity\Mark;
use App\domain\dao\MarkDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkService{
    private $dao;

    public function __construct() {
        $this->dao = new MarkDAO();
    }

    public function create(Request $req){
        $this->dao->create($req);
    }

    public function update(Request $req){
        $this->dao->update($req);
    }
}