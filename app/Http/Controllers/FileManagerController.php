<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    //
    public function index(Request $request)
    {   
        return view('filemanager');
    }
}
