@extends('admin.layout')

@section('main')
      <h2>Update Project</h2>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>  
      @endif

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>     
      @endif
      
      <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                  <label for="name" class="form-label">Project Name</label>
                  <input type="text" class="form-control" id="name" name="title" value="{{ $project->title }}" required>
            </div>
            <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
            </div>
            <div class="mb-3">
                  <label for="technologies" class="form-label">Technologies</label>
                  <input type="text" class="form-control" id="technologies" name="technologies" value="{{ $project->technologies }}" required>
            </div>
            <div class="mb-3">
                  <label for="start_date" class="form-label">Start Date</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
            </div>
            <div class="mb-3">
                  <label for="end_date" class="form-label">End Date</label>
                  <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}" required>
            </div>

            <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" value="{{ $project->slug }}" required>
            </div>

            <div class="mb-3">
                  <label for="github_link" class="form-label">GitHub Link</label>
                  <input type="text" class="form-control" id="github_link" name="github_link" value="{{ $project->github_link }}" required>
            </div>

            <div class="mb-3">
                  <label for="cover_image" class="form-label">Cover Image</label>
                  <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>

            <div class="mb-3">
                  <label for="is_featured" class="form-label">Is Featured</label>
                  <input type="checkbox" class="form-check-input" value="0" id="is_featured" name="is_featured" {{ $project->is_featured ? 'checked' : '' }}>
                  <input type="hidden" class="form-check-input" value="1" id="is_featured" name="is_featured"> {{ $project->is_featured ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                        <option value="ongoing" {{ $project->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="paused" {{ $project->status == 'paused' ? 'selected' : '' }}>Paused</option>
                  </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Project</button>
      </form>
    
@endsection