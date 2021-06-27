<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Domain\Entity\User;
use App\Domain\Service\ClassroomService;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $classrooms = new ClassroomService();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'firstname'       => $request->firstname,
            'lastname'        => $request->lastname,
            'email'           => $request->email,
            'profile_picture' => $request->profile_picture,
            'password'        => Hash::make($request->password)
        ]));

        // if ($request->hasFile('profile_picture')) {
        //     $avatar = request()->file('profile_picture')->getClientOriginalName();
        //     request()->file('profile_picture')->storeAs('images', $user->id, 'local', $avatar, '');
        //     $user->update(['avatar' => $avatar]);
        // }

        event(new Registered($user));

        return view('home', ['classrooms' => $classrooms->mergeClassroomTeachAndTake()]);
    }
}
