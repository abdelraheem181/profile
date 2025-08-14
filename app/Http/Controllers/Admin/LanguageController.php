<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language; // Assuming you have a Language model
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        // Logic to list languages
        $languages = Language::all(); // Assuming you have a Language model
        return view('admin.languages.index', compact('languages'));
       
    }

    public function create()
    {
        // Logic to show create language form
        return view('admin.languages.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new language
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:50',
            'experience_years' => 'required|integer|min:0',
        ]);
        
        $language = new Language();
        $language->name = $request->input('name');
        $language->proficiency_level = $request->input('proficiency_level');
        $language->experience_years = $request->input('experience_years');
        $language->save();  
        return redirect()->route('admin.languages.index')->with('success', 'Language created successfully.');
    }
    public function edit( $id)
    {
        // Logic to show edit form for a language
        $language = Language::findOrFail($id); // Assuming you have a Language model
        return view('admin.languages.edit', compact('language'));

    }   

    public function update(Request $request, Language $language)
    {
        // Logic to update a language
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:50',
            'experience_years' => 'required|integer|min:0',
        ]);
        $language->name = $request->input('name');
        $language->proficiency_level = $request->input('proficiency_level');
        $language->experience_years = $request->input('experience_years');
        $language->save();
        return redirect()->route('admin.languages.index')->with('success', 'Language updated successfully.');
    }
    public function destroy(Language $language)
    {
        // Logic to delete a language
        $language->delete();
        return redirect()->route('admin.languages.index')->with('success', 'Language deleted successfully.');
    } 
    public function show(Language $language)
    {
        // Logic to show a specific language
        return view('admin.languages.show', compact('language'));
    }

        // Store the language in the database
}
