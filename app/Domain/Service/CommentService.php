<?php
namespace App\Domain\Service;

use App\domain\entity\Comment;
use App\domain\dao\CommentDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new CommentDao();
    }

    public function create_comment_material(Request $req){
        $this->dao->createCommentMaterial($req);
    }

    public function create_comment_assignment(Request $req){
        $this->dao->createCommentAssignment($req);
    }

}
