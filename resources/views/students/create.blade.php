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
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ url('add-student') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-white text-center">Add Student</h4>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student Name</label><br>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student age</label><br>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student Email</label><br>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student Mobile</label><br>
                        <input type="text" name="mobile" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student Course</label><br>
                        <input type="text" name="course" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="text-white form-label">Student Image</label><br>
                        <input type="file" name="profile_image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success w-100">Save</button>
                    </div>
                </form>
                <a href="{{ url('students') }}" class=" btn btn-danger w-100">Back</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>