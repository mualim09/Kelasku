<?php

namespace App\domain\dao;

use App\Domain\Entity\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDAO
{
    public function editProfile(Request $req)
    {
        $user = User::find($req->user_id);

        if ($req->edit == 'edit_profile_picture') {
            $user->profile_picture = $req->user_id;
        } else if ($req->edit == 'edit_name') {
            $user->firstname = $req->firstname;
            $user->lastname  = $req->lastname;
        } else if ($req->edit == 'edit_email') {
            $user->email = $req->email;
        } else {
            if (Hash::check($req->old_password, User::find($req->user_id)->password)) {
                $user->password = Hash::make($req->new_password);
            }
        }

        $user->save();
    }
}
