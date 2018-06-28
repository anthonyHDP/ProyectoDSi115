<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class IndiceController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index()
    {
        return view("clinica.index");
    }
}
