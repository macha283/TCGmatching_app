<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserprofileController extends Controller
{
    public function show(User $user)
    {
        return view('Userprofiles.show')->with(['user' => $user]);
    }
}
