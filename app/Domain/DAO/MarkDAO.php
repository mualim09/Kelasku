<?php
namespace App\Domain\Dao;
use App\Domain\Entity\Mark;
use App\Domain\Entity\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarkDAO{

    public function create(Request $req){
        
        $data = new Mark();

        $data->id = Str::uuid();
        $data->student_id = Auth::user()->id;
        $data->assignment_id = $req->assignment_id;

        // dd($req);

        // get file
        if($req->hasFile('file')){
            $file_name = $req->file('file')->getClientOriginalName();
            $data->file = $file_name;
            $req->file('file')->move(public_path().'/files', $file_name);
        }
        $data->mark_value = 0;
        $data->classroom_id = $req->classroom_id;
        date_default_timezone_set('Asia/Jakarta');
        $data->created_at = date('Y-m-d H:i:s');
        $data->save();
    }

    public function update(Request $req)
    {    
        $data = DB::table('marks')->where('id',$req->id)->update(['mark_value'=>$req->mark_value]);
    }

    public function findAll()
    {
        return Mark::all();
    }

}