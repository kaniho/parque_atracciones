<?php

namespace App\Controllers;

class Calendario extends BaseController
{
    public function index(): string
    {
        return view('calendario');
    }
}
