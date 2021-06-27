<?php

namespace App\domain\service;

use App\domain\entity\Material;
use App\domain\dao\MaterialDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialService{
    private $dao;

    public function __construct() {
        $this->dao = new MaterialDAO();
    }

    public function create(Request $req){
        $this->dao->create($req);
    }
}