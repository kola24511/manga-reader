<?php

namespace App\Http\Controllers\Entity\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($name)
    {
        $user = DB::table('users')->where('name', $name)->first();

        return view('user.index', ['user' => $user]);
    }
}
