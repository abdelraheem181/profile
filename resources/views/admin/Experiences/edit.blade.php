@extends('admin.layout')

@section('title', 'Edit Experience')

@section('main')
    <h2>Edit Experience</h2>

    <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
  
        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $experience->job_title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $experience->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">Company</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $experience->company_name }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $experience->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $experience->end_date }}">
        </div>
        <div class="mb-3">
            <label for="is_current" class="form-label">Is Current</label>
            <input type="checkbox" id="is_current" name="is_current" value="1" {{ $experience->is_current ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update Experience</button>
    </form>
@endsection