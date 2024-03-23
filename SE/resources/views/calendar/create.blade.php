<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add EventDate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('calendar.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">วันที่:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">รายละเอียด:</label>
                <textarea name="detail" id="detail" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="dateN_id" class="form-label">ชื่อวันที่:</label>
                <select name="dateN_id" id="dateN_id" class="form-select" required>
                    <option value="">เลือกชื่อวันที่</option>
                    @foreach($dateNames as $dateName)
                        <option value="{{ $dateName->id }}">{{ $dateName->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="checkRest" class="form-label">ตรวจสอบวันหยุด:</label>
                <select name="checkRest" id="checkRest" class="form-select" required>
                    <option value="1">หยุด</option>
                    <option value="0">ไม่หยุด</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </form>
    </div>
</body>
</html>
