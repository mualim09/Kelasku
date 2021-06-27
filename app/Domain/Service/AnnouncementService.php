<?php
namespace App\Domain\Service;

use App\domain\entity\Announcement;
use App\domain\dao\AnnouncementDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnnouncementService
{
    private $dao;

    public function __construct()
    {
        $this->dao = new AnnouncementDao();
    }

    public function create_ann(Request $req){
        $this->dao->create($req);
    }

    public function getAnnounceStudent($req){
        $this->dao->get_announce_student($req);
    }
}
