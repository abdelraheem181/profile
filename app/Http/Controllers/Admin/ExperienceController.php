<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        // Logic to list experiences
        $experiences = Experience::all();
        return view('admin.experiences.index', compact('experiences'));
      
    }

    public function create()
    {
        // Logic to show create experience form
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new experience
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
        ]);



        // Store the experience in the database
         Experience::create($validatedData);

         return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience created successfully!');

       // return back()->with('success', 'Experience created successfully!');
    }

    public function edit($id)
    {
        // Logic to show edit form for a specific experience
        $experience = Experience::findOrFail($id);
        return view('admin.experiences.edit', compact('experience'));
        // For now, just return the ID for demonstration purpos
       // return view('admin.experiences.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific experience
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'is_current' => 'boolean',
        ]);

        // Update the experience in the database
         Experience::findOrFail($id)->update($validatedData);

       return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience updated successfully!');

        // return back()->with('success', 'Experience updated successfully!');
    }
    public function destroy($id)
    {
        // Logic to delete a specific experience
         Experience::destroy($id);

        return back()->with('success', 'Experience deleted successfully!');
    }
}
