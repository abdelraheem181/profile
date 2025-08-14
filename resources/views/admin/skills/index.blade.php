@extends('admin.layout')

@section('title', 'Skills')

@section('main')
    <h2>Skills</h2>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary mb-3">Add New Skill</a>

    <table class="table">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Proficiency</th>
                <th>Years of Experience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->proficiency }}</td>
                    <td>{{ $skill->level }}</td>
                    <td>
                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
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