<?php
namespace App\Domain\Dao;
use App\Domain\Entity\Material;
use App\Domain\Entity\Classroom;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MaterialDao{

    public function create(Request $req){
        $data = new Material();
        // dd($req);
        $data->id = Str::uuid();
        $data->title = $req->input('title');
        $data->description = $req->input('description');
        $data->author = Auth::user()->firstname . ' ' . Auth::user()->lastname;
        
        //get file
        if($req->hasFile('file')){
            $file_name = $req->file('file')->getClientOriginalName();
            $data->file = $file_name;
            $req->file('file')->move(public_path().'/files', $file_name);
        }
        
        $data->classroom_id = $req->classroom_id;
        
        date_default_timezone_set('Asia/Jakarta');
        $data->created_at = date('Y-m-d H:i:s');
        
        $data->save();        
    }

}