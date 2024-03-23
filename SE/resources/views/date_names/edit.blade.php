<!-- resources/views/date_names/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Date Name</title>
</head>
<body>
    <h1>Edit Date Name</h1>

    <!-- Form for editing DateName -->
    <form action="{{ route('date_names.update', $dateName->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $dateName->name }}">
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
