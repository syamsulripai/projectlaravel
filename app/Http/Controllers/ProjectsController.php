<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
   public function index()
{
    $projects = Projects::paginate(6);
    return view('pages.projects', compact('projects'));
}

    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('pages.detailproject', compact('project'));
    }
}