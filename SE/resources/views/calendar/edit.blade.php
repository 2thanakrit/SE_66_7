<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form action="{{ route('calendar.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail:</label>
                <textarea name="detail" id="detail" class="form-control" required>{{ $event->detail }}</textarea>
            </div>
            <div class="mb-3">
                <label for="dateN_id" class="form-label">Date Name:</label>
                <select name="dateN_id" id="dateN_id" class="form-select" required>
                    @foreach($dateNames as $dateName)
                    <option value="{{ $dateName->id }}">{{ $dateName->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="checkRest" class="form-label">Check Rest:</label>
                <select name="checkRest" id="checkRest" class="form-select" required>
                    <option value="1" {{ $event->checkRest == 1 ? 'selected' : '' }}>หยุด</option>
                    <option value="0" {{ $event->checkRest == 0 ? 'selected' : '' }}>ไม่หยุด</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
