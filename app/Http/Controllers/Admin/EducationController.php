<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        // Logic to list educations
        $educations = Education::all();
        return view('admin.education.index', compact('educations'));
      
    }

    public function create()
    {
        // Logic to show create education form
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new education
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:50',
            'field_of_study' => 'required|string|max:255',
        ]);
       
        // Store the education in the database
         Education::create($validatedData);

        return redirect()->route('admin.educations.index')
            ->with('success', 'Education created successfully!');
    }

    public function edit($id)
    {
        // Logic to show edit form for a specific education
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific education
        $education = Education::findOrFail($id);
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:50',
        ]); 
        $education->update($validatedData);
        return redirect()->route('admin.educations.index')
            ->with('success', 'Education updated successfully!');
       
    }
    public function destroy($id)
    {
        // Logic to delete a specific education
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('admin.educations.index')
            ->with('danger', 'Education deleted successfully!');
    }
}
