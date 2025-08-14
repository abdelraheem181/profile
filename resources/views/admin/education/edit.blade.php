@extends('admin.layout')

@section('title', 'Edit Education')

@section('main')
    <h2>Edit Education</h2>

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

    <form action="{{ route('admin.educations.update', $education->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control" id="degree" name="degree" value="{{ $education->degree }}" required>
        </div>
        <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input type="text" class="form-control" id="field_of_study" name="field_of_study" value="{{ $education->field_of_study }}" required>
        </div>
        <div class="mb-3">
            <label for="university" class="form-label">University</label>
            <input type="text" class="form-control" id="university" name="university" value="{{ $education->university }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $education->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $education->end_date }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $education->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Education</button>
    </form>
@endsection
