<!-- resources/views/test-file.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test File Input</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="foto">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
