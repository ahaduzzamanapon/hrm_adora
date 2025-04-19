<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryControler extends Controller
{
    public function index(){

        return view('salary.index');
    }
}
