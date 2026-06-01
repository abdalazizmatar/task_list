<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>
</head>

<body>

    <form action="/store" method="POST">
        @csrf

        <label>Course Name:</label>
        <input type="text" name="name" required>

        <button type="submit">Save</button>
    </form>

</body>

</html>
