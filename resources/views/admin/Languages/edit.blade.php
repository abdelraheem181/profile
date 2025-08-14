@extends('admin.layout')

@section('title', 'Edit Language')

@section('main')
    <h2>Edit Language</h2>

    <form action="{{ route('admin.languages.update', $language->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Language Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $language->name }}" required>
        </div>
        <div class="mb-3">
            <label for="proficiency_level" class="form-label">Proficiency Level</label>
            <select class="form-select" id="proficiency_level" name="proficiency_level" required>
                <option value="">Select Proficiency Level</option>
                <option value="beginner" {{ $language->proficiency_level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="intermediate" {{ $language->proficiency_level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="advanced" {{ $language->proficiency_level == 'advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="experience_years" class="form-label">Years of Experience</label>
            <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ $language->experience_years }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Language</button>
    </form>
@endsection