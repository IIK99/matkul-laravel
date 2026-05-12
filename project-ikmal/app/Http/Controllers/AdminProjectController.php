<?php

namespace App\Http\Controllers;

use App\Models\Projects;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('admin.project.index', compact('projects'));
    }
}
