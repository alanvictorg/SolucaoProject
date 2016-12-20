<?php
/**
 * Copyright (c) 2016. Include Tecnologia http://includetecnologia.com.br
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Services\ServiceProject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var ServiceProject
     */
    private $serviceProject;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ServiceProject $serviceProject)
    {
        $this->middleware('auth');
        $this->serviceProject = $serviceProject;
    }

    /**
     * @return ServiceProject
     */
    public function getServiceProject()
    {
        return $this->serviceProject;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->getServiceProject()->getProjetcsHome();

        return view('home', compact('projects'));
    }
}
