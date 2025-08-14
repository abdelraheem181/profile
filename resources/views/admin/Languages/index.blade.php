@extends('admin.layout')

@section('title', 'Languages')

@section('main')
    <h2>Languages</h2>
    <a href="{{ route('admin.languages.create') }}" class="btn btn-primary mb-3">Add New Language</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Proficiency Level</th>
                <th>Years of Experience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->proficiency_level }}</td>
                    <td>{{ $language->experience_years }}</td>
                    <td>
                        <a href="{{ route('admin.languages.edit', $language->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.languages.destroy', $language->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection