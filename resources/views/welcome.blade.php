<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;font-size:65px;margin-top:200px">Student Management System</h1>
       <div style="text-align: center">
        <a href="{{ route('admin.login') }}" class="btn btn-link">Admin Login</a> <br>
        <a href="{{ route('d-admin.login') }}" class="btn btn-link">Department Admin Login</a>
      <br>
      <a href="{{ route('teacher.login') }}" class="btn btn-link">Teacher Login</a>
      <br>
      <a href="{{ route('student.login') }}" class="btn btn-link">Student Login</a>
       </div>
       <script>
           let name = 'pmi'
       </script>
    </body>
</html>
