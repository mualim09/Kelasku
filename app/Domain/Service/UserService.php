<?php

namespace App\Domain\Service;

use App\domain\dao\UserDAO;
use Illuminate\Http\Request;

class UserService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new UserDAO();
    }

    public function editProfile(Request $req)
    {
        $this->dao->editProfile($req);
    }
}
