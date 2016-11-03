<?php
/**
 * Copyright (c) 2016. Include Tecnologia http://includetecnologia.com.br
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }
}
