<?php

namespace App\domain\dao;

use App\domain\entity\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentDao
{
    public function createCommentMaterial(Request $req){
        $id = Str::uuid();
        $data = new Comment();
        
        $data->id = $id;
        $data->author = Auth::user()->firstname . ' ' . Auth::user()->lastname;
        $data->data_comment = $req->input('txt_comment');
        //harus dipisah pakai if untuk jenis classwork
        
        $data->classwork_id = $req->material_id;
        
        
        
        date_default_timezone_set('Asia/Jakarta');
        $data->created_at = date('Y-m-d H:i:s');
        
        $data->save();
    }

    public function createCommentAssignment(Request $req){
        $id = Str::uuid();
        $data = new Comment();
        
        $data->id = $id;
        $data->author = Auth::user()->firstname . ' ' . Auth::user()->lastname;
        $data->data_comment = $req->input('txt_comment');
        //harus dipisah pakai if untuk jenis classwork
        
        $data->classwork_id = $req->assignment_id;
        
        
        
        date_default_timezone_set('Asia/Jakarta');
        $data->created_at = date('Y-m-d H:i:s');
        
        $data->save();
    }



    // $users = DB::table('users')
    // ->join('contacts', 'users.id', '=', 'contacts.user_id')
    // ->join('orders', 'users.id', '=', 'orders.user_id')
    // ->select('users.*', 'contacts.phone', 'orders.price')
    // ->get(); 
}
