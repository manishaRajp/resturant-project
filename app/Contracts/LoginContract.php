<?php

namespace App\Contracts;

interface LoginContract
{
    public function register(array $data);
    public function login(array $data);
}
