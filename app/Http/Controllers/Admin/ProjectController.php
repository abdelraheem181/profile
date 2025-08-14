<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
         $projects = Project ::all();
        // Logic to list projects
        return view('admin.projects.index', compact('projects'));
       // return view('website.project', compact('projects'));
    }

    public function create()
    {
      
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:ongoing,completed,paused',
            'is_featured' => 'boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url',
            'slug' => 'nullable|string|unique:projects,slug'
        ]);

      if ($request->hasFile('cover_image')) {
          $imageName = time().'.'.$request->cover_image->extension();  
          $request->cover_image->move(public_path('cover_image'), $imageName);
          $path = 'cover_image/' . $imageName; // Store the path relative to public directory
          $validatedData['cover_image'] = $path;
       
        }

        
    
        Project::create($validatedData);

       // return back()->with('success', 'Project created successfully!');

       return redirect()->route('admin.projects.index')
           ->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        // Logic to show edit form for a specific project
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $projectId)
    {
        // Logic to update the project
        // Validate and update the project data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:ongoing,completed,paused',
            'is_featured' => 'boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'github_link' => 'nullable|url',
            'slug' => 'nullable|string|unique:projects,slug,' ,
        ]);

        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$request->cover_image->extension();  
            $path =  $request->cover_image->move(public_path('cover_image'), $imageName);
            $validatedData['cover_image'] = $path;
        }
        $project = Project::findOrFail($projectId);
        $project->update($validatedData);
        return redirect()->route('admin.projects.index');
    }

    public function destroy($projectId)
    {
        // Logic to delete a project
        Project::destroy($projectId);
        return redirect()->route('admin.projects.index');
    }
}
