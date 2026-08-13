<?php

namespace App\Repositories\Classes;
use \App\Repositories\Interfaces\AuthInterface;
class AuthClass implements AuthInterface
{
    public function login(array $data)
    {
        $api = (config('setings.api'));

        if (auth()->attempt($data)) {
            return $api ? success()->json('login successful', auth()->user(), 200) : view('auth.login', ['message' => 'logged in']);
            // return success()->json('login successful', auth()->user(), 200);
        } else {
            return $api ? error()->json('Login failed', 200) : view('auth.login', ['message' => 'login failed']);
        }
    }

    public function check() {
        return view('welcome', ['message' => 'Yes']);
    }
}
