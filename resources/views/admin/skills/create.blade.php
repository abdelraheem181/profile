@extends('admin.layout')

@section('title', 'Create Skill')

@section('main')
    <h1>Create Skill</h1>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="proficiency" class="form-label">Proficiency</label>
            <input type="number" class="form-control" id="proficiency" name="proficiency" rows="3"></input>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label"> Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="" disabled selected>Select level</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
