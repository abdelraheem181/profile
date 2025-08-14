@extends('admin.layout')

@section('title', 'Create Education')

@section('main')
    <h2>Create Education</h2>

    <form action="{{ route('admin.educations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" id="degree" name="degree" required>
        </div>
        <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input type="text" class="form-control" id="field_of_study" name="field_of_study" required>
        </div>
        <div class="mb-3">
            <label for="university" class="form-label">University</label>
            <input type="text" class="form-control" id="university" name="university" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
       <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="number" class="form-control" id="grade" name="grade">
        </div>
           
        <button type="submit" class="btn btn-primary">Create Education</button>
    </form>
@endsection