<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill; // Assuming you have a Skill model
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // Logic to list skills
        $skills = Skill::all(); // Assuming you have a Skill model
        return view('admin.skills.index', compact('skills'));
       
    }

    public function create()
    {
        // Logic to show create skill form
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new skill
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string',
            'proficiency' => 'nullable|integer|min:1|max:100',
            'description' => 'nullable|string',
        ]);

        // Store the skill in the database
        Skill::create($validatedData);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully!');
    }

    public function edit($id)
    {
        // Logic to show edit form for a specific skill
        $skill = Skill::findOrFail($id); // Assuming you have a Skill model
        return view('admin.skills.edit', compact('skill'));
     
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific skill
        $skill = Skill::findOrFail($id); // Assuming you have a Skill model
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string',
            'proficiency' => 'nullable|integer|min:1|max:100',
            'description' => 'nullable|string',
        ]); 
        $skill->update($validatedData);
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully!');
   
    }
    public function destroy($id)
    {
        // Logic to delete a specific skill
        $skill = Skill::findOrFail($id); // Assuming you have a Skill model
        $skill->delete();
        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}
