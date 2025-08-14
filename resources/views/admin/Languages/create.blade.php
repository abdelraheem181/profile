@extends('admin.layout')

@section('title', 'Create Language')

@section('main')
    <h2>Create Language</h2>

    <form action="{{ route('admin.languages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Language Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="proficiency_level" class="form-label">Proficiency Level</label>
            <select class="form-select" id="proficiency_level" name="proficiency_level" required>
                <option value="">Select Proficiency Level</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="experience_years" class="form-label">Years of Experience</label>
            <input type="number" class="form-control" id="experience_years" name="experience_years" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Language</button>
    </form>
@endsection       