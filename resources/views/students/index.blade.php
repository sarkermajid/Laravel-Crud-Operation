<?php
    namespace App\Http\Controllers;
    use App\Models\Student;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <h2 class="text-center bg-warning text-danger p-3">Students Crud Operation</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-3">
                <a href="{{ url('add-student') }}" class=" btn btn-success mb-3">Add student</a>
                @if (session('delete'))
                    <div class="alert alert-danger">{{ session('delete') }}</div>
                @endif
                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table table-border table-stripe table-success">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Course</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($student as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/students/'.$item->profile_image) }}" width="80px" height="60px" alt="image">
                                    </td>
                                    <td><a href="{{ url('edit-student/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>