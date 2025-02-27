<?php

namespace App\Controllers;

class UserSettings extends BaseController
{
    public function index(): string
    {
        return view('user_settings');
    }
}