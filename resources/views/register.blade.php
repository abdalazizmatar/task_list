<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>

    <h2>{{ $title }}</h2>

    <form action="/register" method="POST">
        @csrf

        <input type="text" name="student_name" placeholder="Student Name">

        <select name="level">
            @foreach ($levels as $key => $level)
                <option value="{{ $key }}">
                    {{ $level }}
                </option>
            @endforeach
        </select>

        <button type="submit">Register</button>
    </form>

</body>

</html>
