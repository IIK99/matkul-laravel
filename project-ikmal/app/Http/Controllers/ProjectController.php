<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        // $projects = Projects::all();
        $projects = Projects::paginate(3);
        return view('pages.projects', compact('projects'));
    }

    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('pages.name-detail', compact('project'));
    }
}
