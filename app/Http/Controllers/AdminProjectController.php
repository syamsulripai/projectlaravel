<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Projects;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $imageName = null;

        // Upload Image
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('bootstrap-5.3.8-dist/images'), $imageName);
        }

        // Simpan Data
        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'status' => $request->status,
            'image' => $imageName
        ]);

        return redirect()->route('projects.index')
    ->with('success', 'Project created successfully.');
    }

    public function edit($id)
{
    $project = Projects::findOrFail($id);

    return view('admin.projects.edit', compact('project'));
}

    public function update(Request $request, $id)
{
    $project = Projects::findOrFail($id);

    $imageName = $project->image;

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('bootstrap-5.3.8-dist/images'), $imageName);
    }

    $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'teknologi' => $request->teknologi,
        'status' => $request->status,
        'image' => $imageName
    ]);

    return redirect()->route('projects.index')
    ->with('success', 'Project updated successfully.');
}
    public function destroy($id)
{
    $project = Projects::findOrFail($id);

    // lokasi gambar
    $path = public_path('bootstrap-5.3.8-dist/images/' . $project->image);

    // hapus file gambar jika ada
    if (File::exists($path)) {
        File::delete($path);
    }

    // hapus data database
    $project->delete();

    return redirect()->route('projects.index')
    ->with('success', 'Project deleted successfully.');
}

    public function cetakPDF ()
    {
    $projects = Projects::all();
    $pdf = Pdf::loadView('admin.projects.pdf', compact('projects'));
    return $pdf->download('projects.pdf');
    }
}