<?php

namespace App\domain\dao;
use Illuminate\Support\Facades\Auth;
use App\domain\Entity\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssignmentDAO{

    public function create(Request $req){
        $data = new Assignment();
        $data->id = Str::uuid();
        $data->title = $req->input('title');
        $data->description = $req->input('description');
        $data->author = Auth::user()->firstname . ' ' . Auth::user()->lastname;
        
        
        if($req->date == null){
            $due_date = $req->time; //get due time only
        }else if($req->time == null){
            $due_date = $req->date; //get due date only
        }else{
            $due_date = $req->date.' '.$req->time; //get due date and time
        }
        
        $data->due_date = $due_date;

        $data->max_points = $req->max_points;

        // get file
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