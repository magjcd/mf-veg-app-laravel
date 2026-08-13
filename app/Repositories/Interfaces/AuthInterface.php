<?php

namespace App\Repositories\Interfaces;

interface AuthInterface
{
    public function login(array $data);
    public function check();
}
