<?php

namespace App\domain\dao;

use App\domain\entity\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementDao
{
    public function create(Request $req){
        $id = Str::uuid();
        $data = new Announcement();
        
        $data->id = $id;
        $data->description = $req->input('desc');
        $data->classroom_id = $req->classroom_id;
        date_default_timezone_set('Asia/Jakarta');
        $data->author = Auth::user()->firstname . ' ' . Auth::user()->lastname;
        $data->created_at = date('Y-m-d H:i:s');
        
        $data->save();
    }

    public function get_announce_student($announce_id){
        return DB::table('announcement')->where('id',$announce_id)->get();
    }


    // $users = DB::table('users')
    // ->join('contacts', 'users.id', '=', 'contacts.user_id')
    // ->join('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.*', 'contacts.phone', 'orders.price')
    // ->get(); 
}
