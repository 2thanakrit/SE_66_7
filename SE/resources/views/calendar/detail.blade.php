<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* เพิ่มสไตล์เพิ่มเติมที่นี่ */
        .container {
            max-width: 800px; /* กำหนดความกว้างสูงสุดของคอนเทนเนอร์ */
        }

        .event-details {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa; /* สีพื้นหลังของกล่องรายละเอียด */
        }

        .event-details p {
            word-wrap: break-word; /* บังคับข้อความขึ้นบรรทัดใหม่เมื่อยาวเกินไป */
        }

        .btn-primary {
            background-color: #007bff; /* สีพื้นหลังของปุ่มสีฟ้า */
            border-color: #007bff; /* สีเส้นขอบของปุ่มสีฟ้า */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* สีพื้นหลังของปุ่มสีฟ้าเมื่อโฮเวอร์ */
            border-color: #0056b3; /* สีเส้นขอบของปุ่มสีฟ้าเมื่อโฮเวอร์ */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Event Detail</h1>
        <div class="event-details">
            <p><strong>Date:</strong> {{ $event->date }}</p>
            <p><strong>Detail:</strong> {{ $event->detail }}</p>
            <p><strong>Date Name:</strong> {{ $event->dateName->name }}</p>
            <p><strong>Check Rest:</strong> {{ $event->checkRest == 1 ? 'หยุด' : 'ไม่หยุด' }}</p>
        </div>
        <a href="{{ route('calendar.index') }}" class="btn btn-primary mt-3">Return</a>
    </div>
</body>
</html>
