@extends('admin.layout')

@section('title', 'Education Index')

@section('main')

    <h2>Education List</h2>
       <a href="{{ route('admin.educations.create') }}" class="btn btn-primary">Add Education</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Degree</th>
                <th>Field of Study</th>
                <th>Institution</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($educations as $education)
                <tr>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->field_of_study }}</td>
                    <td>{{ $education->university }}</td>
                    <td>{{ $education->start_date }}</td>
                    <td>{{ $education->end_date }}</td>
                   <td>{{ $education->description }}</td>
                    <td>{{ $education->grade }}</td>
                    <td>
                        <a href="{{ route('admin.educations.edit', $education->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" style="display:inline;">
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