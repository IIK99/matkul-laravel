<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('bootstrap-5.3.8-dist/images'), $imagePath);
        }

        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        $project = Projects::findOrFail($id);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('bootstrap-5.3.8-dist/images'), $imagePath);
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $imagePath,
            'status' => $request->status,
        ]);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function cetak_pdf()
    {
        $projects = Projects::latest()->get();
        $pdf = Pdf::loadView('admin.project.pdf', compact('projects'));
        return $pdf->stream('projects.pdf');
    }
    public function cetak_pdf_By_Id($id)
    {
        $project = Projects::findOrFail($id);
        $pdf = Pdf::loadView('admin.project.pdf-by-id', compact('project'));
        return $pdf->stream('project.pdf');
    }

}
