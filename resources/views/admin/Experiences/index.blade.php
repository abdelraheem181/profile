@extends('admin.layout')

@section('title', 'Experience List')

@section('main')
    <h2>Experience List</h2>
      <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary mb-3">Create New Experience</a>    
      <table class="table">
            <thead>
                  <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Position</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Description</th>
                  <th>Is Current</th>
                  <th>Actions</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($experiences as $experience)
                  <tr>
                        <td>{{ $experience->id }}</td>
                        <td>{{ $experience->company_name }}</td>
                        <td>{{ $experience->job_title }}</td>
                        <td>{{ $experience->start_date }}</td>
                        <td>{{ $experience->end_date }}</td>
                        <td>{{ $experience->description }}</td>
                        <td>{{ $experience->is_current ? 'Yes' : 'No' }}</td>
                        <td>
                              <a href="{{ route('admin.experiences.edit', $experience->id) }}" class="btn btn-warning">Edit</a>
                              <form action="{{ route('admin.experiences.destroy', $experience->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                        </td>
                  </tr>
                  @endforeach
            </tbody>
    <!-- Logic to display the list of experiences -->
@endsection 