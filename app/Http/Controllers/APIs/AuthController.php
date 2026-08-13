<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

use \App\Repositories\Interfaces\AuthInterface;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->only(['email', 'password']);
            return $this->auth->login($data);
        } catch (\Throwable $th) {
            return error(false, $th->getMessage(), 500);
        }
    }

    public function check()
    {
        return $this->auth->check();
    }
}
